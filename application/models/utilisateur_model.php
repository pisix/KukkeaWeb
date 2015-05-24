<?php
/**
 * Created by PhpStorm.
 * User: Franky
 * Date: 27/04/14
 * Time: 07:52
 */
class Utilisateur_model  extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function get_phone_user($user)
    {
        $row = $this->db->get_where('utilisateur', array('NUMUSER' => $user))->row();
        return $row->TELUSER;
    }
    public function get_id_user_by_email($email)
    {
        $row = $this->db->get_where('utilisateur', array('EMAILUSER' => $email))->row();
        return $row->NUMUSER;
    }

    public function get_email_user_by_id($id)
    {
        $row = $this->db->get_where('utilisateur', array('NUMUSER' => $id))->row();
        return $row->EMAILUSER;
    }

    function adduser($data,$photo_data)
    {
        $this->db->insert('photo',$photo_data);
        $id_photo=$this->db->insert_id();
        $data['IDPHOTO']=$id_photo;

        $this->db->insert('utilisateur',$data);

    }

    function adduser_pro($data,$logo_data)
    {

        $this->db->insert('photo',$logo_data);
        $id_photo=$this->db->insert_id();
        $data['IDPHOTO']=$id_photo;
        $this->db->insert('utilisateur',$data);

    }
    function get_user($id)
    {
        $this->db->where('NUMUSER',$id);
        $q =$this->db->get('utilisateur');
        if($q->num_rows()>0)
        {
            $row =$q->row();
            return $row;
        }
    }

    function get_user_info_by_id($id)
    {
        $this->db->select('utilisateur.*,photo.*')
            ->from('utilisateur');
        $this->db->join('photo', 'photo.IDPHOTO = utilisateur.IDPHOTO');
        $this->db->where('utilisateur.NUMUSER',$id);

        $q=$this->db->get();
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                $data[]=$row;
            }
            return $data;
        }
    }

    function get_user_birthday($id)
    {
        $this->db->select('utilisateur.DATENAISSANCEUSER')
            ->from('utilisateur');
        $this->db->where('utilisateur.NUMUSER',$id);

        $q=$this->db->get();
        foreach ($q->result() as $row)
        {
            return $row->DATENAISSANCEUSER;
        }
    }



    function update_user($id,$data)
    {
            $this->db->where('NUMUSER',$id);
            $this->db->update('utilisateur',$data);
    }


    function changepassword($id,$data)
    {
        $this->db->where('NUMUTILISATEUR',$id);
        $this->db->update('utilisateur',$data);
    }

    function set_rs($email,$data)
    {
        $this->db->where('EMAILUSER', $email);
        $this->db->update('utilisateur', $data);
    }

    function set_confirm_inscription($email,$data)
    {
        $this->db->where('EMAILUSER', $email);
        $this->db->update('utilisateur', $data);
    }
    function get_password_by_email($email)
    {
        $this->db->select('utilisateur.MOTDEPASSEUSER')
            ->from('utilisateur');


        $this->db->where('utilisateur.EMAILUSER',$email);

        $q=$this->db->get();
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                $data[]=$row;
            }
            return $data;
        }
    }

    function get_nom_image($email)
    {
        $this->db->select('photo.CHEMINPHOTO')
            ->from('photo');
        $this->db->join('utilisateur', 'photo.IDPHOTO = utilisateur.IDPHOTO');
        $this->db->where('utilisateur.EMAILUSER',$email);
        $q=$this->db->get();
        foreach($q->result() as $row)
        {
            return $row->CHEMINPHOTO;
        }


    }


    function get_number_user()
    {
        return $this->db->count_all_results('utilisateur');
    }


    function get_anciennete($id_user)
    {
        $query=$this->db->query("SELECT DATEINSCRIPTION FROM utilisateur WHERE NUMUSER =".$id_user);


        $dateInscription='';
        foreach($query->result() as $row)
        {
            log_message('info','dans le foreach');
            $dateInscription=$row->DATEINSCRIPTION;
        }
       /* $ts1=strtotime($dateInscription);
        $ts2=strtotime(date('Y-m-d'));

        $year1=date('Y',$ts1);
        $year2=date('Y',$ts2);

        $month1=date('m',$ts1);
        $month2=date('m',$ts2);
        $anciennete= (($year2 - $year1) * 12) + ($month2 - $month1);*/


        $start = $dateInscription;
        $end = date('Y-m-d');
        $datetime1 = new DateTime($start);
        $datetime2 = new DateTime($end);

        log_message('info','datetime1: '.$dateInscription);
        log_message('info','datetime2: '.$end);

        $interval = $datetime1->diff($datetime2);
        $anciennete= $interval->format('%m'); //Retourne le nombre de mois


        return $anciennete;
    }

    public function get_nombre_avis($id_user)
    {
        $query=$this->db->query("SELECT NUMAVIS FROM avis WHERE NUMUSER='".$id_user."'");
        return $query->num_rows();
    }

    public function get_pourcentage_part_avis_positif($id_user)
    {
        $nombre_avis=$this->get_nombre_avis($id_user);
        $query=$this->db->query("SELECT NUMAVIS FROM avis WHERE NUMUSER='".$id_user."' AND NOTE >=3");
        $nombre_avis_positif=$query->num_rows();

        if($nombre_avis>0)
            $pourcentage_avis_positif=($nombre_avis_positif/$nombre_avis)*100;
        else
            $pourcentage_avis_positif=0;
        return $pourcentage_avis_positif;
    }
    public function check_if_adresse_de_residence($id_user)
    {
        $query=$this->db->query("SELECT CONFIRMINSCRIPTIONCOURRIER FROM utilisateur WHERE NUMUSER='".$id_user."'");
        $adresse_de_residence='';
        foreach($query->result() as $row)
        {
            $adresse_de_residence=$row->CONFIRMINSCRIPTIONCOURRIER;
        }

        if($adresse_de_residence==0 || $adresse_de_residence==NULL)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function check_numero_telephone($id_user)
    {
        $query=$this->db->query("SELECT VERIFNUMTEL FROM utilisateur WHERE NUMUSER='".$id_user."'");
        $numero_telephone='';
        foreach($query->result() as $row)
        {
            $numero_telephone=$row->VERIFNUMTEL;
        }

        if($numero_telephone==0 || $numero_telephone==NULL)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function get_experience($id_user)
    {

        $numero_telephone=$this->check_numero_telephone($id_user);
        $avis_recu=$this->get_nombre_avis($id_user);
        $part_avis_positif=$this->get_pourcentage_part_avis_positif($id_user);
        $anciennete=$this->get_anciennete($id_user);



        log_message('info','-----------------------------------Expérience USER-------------------------------------');
        log_message('info','UTILISATEUR: '.$id_user);
        log_message('info', 'Téléphone vérifié: '.$numero_telephone);
        log_message('info','Nombre d\'avis recus: '. $avis_recu);
        log_message('info', 'Parts d\'avis positif: '.$part_avis_positif);
        log_message('info', 'Anciennete: '.$anciennete);
        log_message('info','-----------------------------------FIN Expérience USER-----------------------------------');


        if($numero_telephone==true && ($avis_recu>=1 && $avis_recu <3) && $part_avis_positif==100 && ($anciennete>=1))
            return  'Habitué';
        else if($numero_telephone==true && ($avis_recu>=3 && $avis_recu<6) && ($part_avis_positif>=70 && $part_avis_positif <80) && ($anciennete>=3 && $anciennete<6))
            return 'Confirmé';
        else if($numero_telephone==true && ($avis_recu>=6 && $avis_recu <12) && ($part_avis_positif>=80 && $part_avis_positif <90) && ($anciennete>=6 && $anciennete<12))
            return 'Expert';
        else if($numero_telephone==true && ($avis_recu>=12 && $part_avis_positif>=90) && ($part_avis_positif <100 && $anciennete>=12))
            return 'Voyageur';
        else if($numero_telephone==false)
            return 'Débutant';
        else
            return 'Débutant';
    }

}