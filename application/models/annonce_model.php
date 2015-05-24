<?php
/**
 * Created by PhpStorm.
 * User: Franky
 * Date: 26/04/14
 * Time: 19:03
 */

class Annonce_model  extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    function read()
    {

        $q=$this->db->get('annonces');
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                $data[]=$row;
            }
            return $data;
        }

    }

    function delete($id)
    {
        $this->db->where('NUMANNONCE',$id);
        $this->db->delete('annonces');

    }

    function update_annonce($id,$data)
    {
        $this->db->where('NUMANNONCE',$id);
        $this->db->update('annonces',$data);
    }
    function get_annonce($id)
    {
        $this->db->where('NUMANNONCE',$id);
        $q =$this->db->get('annonces');
        if($q->num_rows()>0)
        {
            $row =$q->row();
            return $row;
        }
    }
    function create($data)
    {
        $this->db->insert('annonces',$data);
    }

    function get_number_annonce_user_by_id($id)
    {
        $this->db->select('utilisateur.*, COUNT(annonces.NUMANNONCE)')
            ->from('utilisateur');

        $this->db->join('annonces', 'annonces.NUMUSER = utilisateur.NUMUSER');

        $this->db->where('annonces.NUMUSER',$id)
            ->group_by('annonces.NUMUSER');

        $q=$this->db->count_all_results();
        return $q;

    }
    function get_all_annonce_envoi()
    {
        $this->db->select(" annonces.*,utilisateur.NOMUSER,utilisateur.DATENAISSANCEUSER,utilisateur.PRENOMUSER,utilisateur.NUMUSER,utilisateur.IDPHOTO,utilisateur.PSEUDOUSER, utilisateur.SIREN,utilisateur.PAYSUSER,utilisateur.VILLEUSER,utilisateur.ADRESSEUSER,utilisateur.CODEPOSTALUSER,utilisateur.TELUSER,utilisateur.EMAILUSER,photo.*, annonces.NOMVILLEARRIVEE,  annonces.NOMVILLEDEPART from annonces inner join utilisateur on annonces.NUMUSER = utilisateur.NUMUSER inner join photo on photo.IDPHOTO=utilisateur.IDPHOTO   where annonces.TYPE_ANNONCE='Envoi'");
        $this->db->order_by("annonces.DATEDEBUTANNONCE","asc");

        $q=$this->db->get();
        $data = Array();
        $i=0;
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                //$experience['experience']=$this->utilisateur_model->get_experience($row->NUMUSER);
                $data[$i]=$row;
                $data[$i]->EXPERIENCE=$this->utilisateur_model->get_experience($row->NUMUSER);
                $i++;
            }
            return $data;
        }
    }
    function get_all_annonce_transport_by_type_user()
    {
        $this->db->select('annonces.*,utilisateur.*,photo.*, annonces.NOMVILLEARRIVEE,  annonces.NOMVILLEDEPART')
            ->from('annonces');
        $this->db->join('utilisateur', 'annonces.NUMUSER = utilisateur.NUMUSER');
        $this->db->join('photo', 'utilisateur.IDPHOTO = photo.IDPHOTO');
        $this->db->where('annonces.TYPE_ANNONCE','Transport');
        $this->db->where('utilisateur.TYPE_UTILISATEUR','PART');
        $this->db->order_by("annonces.DATEDEBUTANNONCE","asc");

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
    function get_all_annonce_transport_by_type_user_pro()
    {
        $this->db->select('annonces.*,utilisateur.*,photo.*, annonces.NOMVILLEARRIVEE, annonces.NOMVILLEDEPART')
            ->from('annonces');
        $this->db->join('utilisateur', 'annonces.NUMUSER = utilisateur.NUMUSER');
        $this->db->join('photo', 'utilisateur.IDPHOTO = photo.IDPHOTO');
        $this->db->where('annonces.TYPE_annonce','Transport');
        $this->db->where('utilisateur.TYPE_UTILISATEUR','PRO');
        $this->db->order_by("annonces.DATEDEBUTANNONCE","asc");


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


    function get_all_annonce_envoi_by_type_user()
    {
        $this->db->select('annonces.*,utilisateur.*,photo.*, annonces.NOMVILLEARRIVEE, annonces.NOMVILLEDEPART')
            ->from('annonces');
        $this->db->join('utilisateur', 'annonces.NUMUSER = utilisateur.NUMUSER');
        $this->db->join('photo', 'utilisateur.IDPHOTO = photo.IDPHOTO');
        $this->db->where('annonces.TYPE_ANNONCE','Envoi');
        $this->db->where('utilisateur.TYPE_UTILISATEUR','PART');
        $this->db->order_by("annonces.DATEDEBUTANNONCE","asc");

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


    function get_all_annonce_envoi_by_type_user_pro()
    {
        $this->db->select('annonces.*,utilisateur.*,photo.*, annonces.NOMVILLEARRIVEE, annonces.NOMVILLEDEPART,')
            ->from('annonces');
        $this->db->join('utilisateur', 'annonces.NUMUSER = utilisateur.NUMUSER');
        $this->db->join('photo', 'utilisateur.IDPHOTO = photo.IDPHOTO');
        $this->db->where('annonces.TYPE_ANNONCE','Envoi');
        $this->db->where('utilisateur.TYPE_UTILISATEUR','PRO');
        $this->db->order_by("annonces.DATEDEBUTANNONCE","asc");

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


    function get_nom_ville_by_id($idville)
    {

    }


    function get_all_annonce_transport()
    {
        $this->db->select(" annonces.NUMANNONCE,annonces.TITREANNONCE, annonces.CONTENUANNONCE, annonces.DATEAJOUTANNONCE,annonces.PRIX, annonces.POIDS, annonces.DATEDEBUTANNONCE,annonces.DATEFINANNONCE, utilisateur.*,photo.*, annonces.NOMVILLEARRIVEE, annonces.NOMVILLEDEPART from annonces inner join utilisateur on annonces.NUMUSER = utilisateur.NUMUSER inner join photo on photo.IDPHOTO=utilisateur.IDPHOTO   where annonces.TYPE_ANNONCE='Transport'");
        $this->db->order_by("annonces.DATEDEBUTANNONCE","asc");
        $q=$this->db->get();
        $data = Array();
        $i=0;
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                //$experience['experience']=$this->utilisateur_model->get_experience($row->NUMUSER);
                $data[$i]=$row;
                $data[$i]->EXPERIENCE=$this->utilisateur_model->get_experience($row->NUMUSER);
                $i++;
            }
            return $data;
        }
    }

    function get_all_annonce()
    {
        $this->db->select(" annonces.*,utilisateur.NUMUSER,utilisateur.IDPHOTO,utilisateur.PSEUDOUSER, utilisateur.SIREN,utilisateur.PAYSUSER,utilisateur.VILLEUSER,utilisateur.ADRESSEUSER,utilisateur.CODEPOSTALUSER,utilisateur.TELUSER,utilisateur.EMAILUSER,photo.*, annonces.NOMVILLEARRIVEE, annonces.NOMVILLEDEPART from annonces inner join utilisateur on annonces.NUMUSER = utilisateur.NUMUSER inner join photo on photo.IDPHOTO=utilisateur.IDPHOTO ");
        $this->db->order_by("annonces.DATEDEBUTANNONCE","asc");
        $q=$this->db->get();
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                $experience=$this->utilisateur_model->get_experience($row->NUMUSER);
                $date['EXPERIENCE']=$experience;
                $data[]=$row;
            }
            return $data;
        }
    }

    function get_number_all_annonce()
    {
        $this->db->select('COUNT(annonces.NUMANNONCE)')
            ->from('annonces');
        $q=$this->db->count_all_results();
        return $q;
    }

    /*Pagination*/
    public function all_annonce_envoi_count() {
        $this->db->where('annonces.TYPE_ANNONCE','Envoi');
        return $this->db->count_all("annonce");
    }

    public function all_annonce_transport_count() {
        $this->db->where('annonces.TYPE_ANNONCE','Transport');
        return $this->db->count_all("annonce");
    }
    function fetch_annonce_transport($limit,$start)
    {
        $this->db->limit($limit, $start);
        $this->db->select(" annonces.*,utilisateur.NOMUSER,utilisateur.DATENAISSANCEUSER,utilisateur.PRENOMUSER,utilisateur.NUMUSER,utilisateur.IDPHOTO,utilisateur.PSEUDOUSER, utilisateur.SIREN,utilisateur.PAYSUSER,utilisateur.VILLEUSER,utilisateur.ADRESSEUSER,utilisateur.CODEPOSTALUSER,utilisateur.TELUSER,utilisateur.EMAILUSER,photo.*, annonces.NOMVILLEARRIVEE,  annonces.NOMVILLEDEPART from annonces inner join utilisateur on annonces.NUMUSER = utilisateur.NUMUSER inner join photo on photo.IDPHOTO=utilisateur.IDPHOTO   where annonces.TYPE_ANNONCE='Transport'");
        $this->db->order_by("annonces.DATEDEBUTANNONCE","asc");
        $q=$this->db->get();
        $data = Array();
        $i=0;
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                //$experience['experience']=$this->utilisateur_model->get_experience($row->NUMUSER);
                $data[$i]=$row;
                $data[$i]->EXPERIENCE=$this->utilisateur_model->get_experience($row->NUMUSER);
                $i++;
            }
            return $data;
        }
    }

    function fetch_annonce_envoi($limit,$start)
    {
        $this->db->limit($limit, $start);
        $this->db->select(" annonces.*,utilisateur.NOMUSER,utilisateur.DATENAISSANCEUSER,utilisateur.PRENOMUSER,utilisateur.NUMUSER,utilisateur.IDPHOTO,utilisateur.PSEUDOUSER, utilisateur.SIREN,utilisateur.PAYSUSER,utilisateur.VILLEUSER,utilisateur.ADRESSEUSER,utilisateur.CODEPOSTALUSER,utilisateur.TELUSER,utilisateur.EMAILUSER,photo.*, annonces.NOMVILLEARRIVEE,  annonces.NOMVILLEDEPART from annonces inner join utilisateur on annonces.NUMUSER = utilisateur.NUMUSER inner join photo on photo.IDPHOTO=utilisateur.IDPHOTO   where annonces.TYPE_ANNONCE='Envoi'");
        $this->db->order_by("annonces.DATEDEBUTANNONCE","asc");
        $q=$this->db->get();
        $data = Array();
        $i=0;
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                //$experience['experience']=$this->utilisateur_model->get_experience($row->NUMUSER);
                $data[$i]=$row;
                $data[$i]->EXPERIENCE=$this->utilisateur_model->get_experience($row->NUMUSER);
                $i++;
            }
            return $data;
        }
    }



    /*End pagination*/


    function get_number_annonce_transport_by_type_user()
    {

        $this->db->select('COUNT(annonces.NUMANNONCE)')
            ->from('annonces');
        $this->db->join('utilisateur','annonces.NUMUSER=utilisateur.NUMUSER');
        $this->db->where('annonces.TYPE_ANNONCE','Transport');
        $this->db->where('utilisateur.TYPE_UTILISATEUR','PART');

        $q=$this->db->count_all_results();
        return $q;
    }

    function get_number_annonce_transport_by_type_user_pro()
    {

        $this->db->select('COUNT(annonces.NUMANNONCE)')
            ->from('annonces');
        $this->db->join('utilisateur','annonces.NUMUSER=utilisateur.NUMUSER');
        $this->db->where('annonces.TYPE_ANNONCE','Transport');
        $this->db->where('utilisateur.TYPE_UTILISATEUR','PRO');
        $q=$this->db->count_all_results();
        return $q;
    }

    function get_number_annonce_transport()
    {
        $this->db->select('COUNT(annonces.NUMANNONCE)')
            ->from('annonces');
        $this->db->where('annonces.TYPE_ANNONCE','Transport')
           ;
        $q=$this->db->count_all_results();
        return $q;
    }

    function get_number_annonce_envoi_by_type_user()
    {

        $this->db->select('COUNT(annonces.NUMANNONCE)')
            ->from('annonces');
        $this->db->join('utilisateur','annonces.NUMUSER=utilisateur.NUMUSER');
        $this->db->where('annonces.TYPE_ANNONCE','Envoi');
        $this->db->where('utilisateur.TYPE_UTILISATEUR','PART')
       ;

        $q=$this->db->count_all_results();
        return $q;
    }
    function get_number_annonce_envoi_by_type_user_pro()
    {

        $this->db->select('COUNT(annonces.NUMANNONCE)')
            ->from('annonces');
        $this->db->join('utilisateur','annonces.NUMUSER=utilisateur.NUMUSER');
        $this->db->where('annonces.TYPE_ANNONCE','Envoi');
        $this->db->where('utilisateur.TYPE_UTILISATEUR','PRO');

        $q=$this->db->count_all_results();
        return $q;
    }





    function find_annonce_by_ville_depart($villedepart)
    {

    }
    function find_annonce_by_ville_arrivee($villearrivee)
    {

    }
    function find_annonce_by_pays_depart($paysdepart)
    {

    }
    function find_annonce_by_pays_arrivee($paysarrivee)
    {

    }



    function get_annonce_part_by_id($id_annonce)
    {
        $this->db->select('utilisateur.*, photo.*,annonces.*,annonces.NOMVILLEDEPART, annonces.NOMVILLEARRIVEE')
            ->from('utilisateur');
        $this->db->join('annonces', 'annonces.NUMUSER = utilisateur.NUMUSER');
        $this->db->join('photo', 'utilisateur.IDPHOTO = photo.IDPHOTO');
        $this->db->where('NUMANNONCE',$id_annonce);
        $this->db->where('utilisateur.TYPE_UTILISATEUR','PART');


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

    function get_annonce_pro_by_id($id_annonce)
    {
        $this->db->select('utilisateur.*, photo.*,annonces.*, annonces.NOMVILLEARRIVEE, annonces.NOMVILLEDEPART')
            ->from('utilisateur');
        $this->db->join('annonces', 'annonces.NUMUSER = utilisateur.NUMUSER');
        $this->db->join('photo', 'utilisateur.IDPHOTO = photo.IDPHOTO');
        $this->db->where('NUMANNONCE',$id_annonce);
        $this->db->where('utilisateur.TYPE_UTILISATEUR','PRO');



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

    function get_all_annonce_professionnel()
    {
        $this->db->select('utilisateur.*, photo.*,annonces.*, annonces.NOMVILLEARRIVEE, annonces.NOMVILLEDEPART')
        ->from('utilisateur');
        $this->db->join('annonces', 'annonces.NUMUSER = utilisateur.NUMUSER');
        $this->db->join('photo', 'utilisateur.IDPHOTO = photo.IDPHOTO');
        $this->db->where('utilisateur.TYPE_UTILISATEUR','PRO');
        $this->db->order_by("annonces.DATEDEBUTANNONCE","asc");

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

    function get_all_annonce_particulier()
    {
        $this->db->select('utilisateur.*, photo.*,annonces.*, annonces.NOMVILLEARRIVEE, annonces.NOMVILLEDEPART')
            ->from('utilisateur');
        $this->db->join('annonces', 'annonces.NUMUSER = utilisateur.NUMUSER');
        $this->db->join('photo', 'utilisateur.IDPHOTO = photo.IDPHOTO');
        $this->db->where('utilisateur.TYPE_UTILISATEUR','PART');
        $this->db->order_by("annonces.DATEDEBUTANNONCE","asc");

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

    function get_annonce_by_id($id_annonce)
    {
        $this->db->select(" annonces.*,utilisateur.*,photo.*, annonces.NOMVILLEARRIVEE, annonces.NOMVILLEDEPART  from annonces inner join utilisateur on annonces.NUMUSER = utilisateur.NUMUSER inner join  photo on photo.IDPHOTO=utilisateur.IDPHOTO  where annonces.NUMANNONCE='$id_annonce' ");
        $q=$this->db->get();
        $data = Array();
        $i=0;
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                //$experience['experience']=$this->utilisateur_model->get_experience($row->NUMUSER);
                $data[$i]=$row;
                $data[$i]->EXPERIENCE=$this->utilisateur_model->get_experience($row->NUMUSER);
                $i++;
            }
            return $data;
        }

    }

    function get_number_annonce_professionnel()
    {
        $this->db->select('annonces.*, COUNT(annonces.NUMANNONCE)')
            ->from('annonces');
        $this->db->join('utilisateur','annonces.NUMUSER=utilisateur.NUMUSER');
        $this->db->where('utilisateur.TYPE_UTILISATEUR','PRO');

        $q=$this->db->count_all_results();
        return $q;

    }

    function get_number_annonce_particulier()
    {
        $this->db->select('annonces.*, COUNT(annonces.NUMANNONCE)')
            ->from('annonces');
        $this->db->join('utilisateur','annonces.NUMUSER=utilisateur.NUMUSER');
        $this->db->where('utilisateur.TYPE_UTILISATEUR','PART');
        $this->db->order_by("annonces.DATEDEBUTANNONCE","asc");


        $q=$this->db->count_all_results();
        return $q;

    }

    function find_by_ville_depart_and_ville_arrivee($villedepart,$villearrivee,$categorie,$date)
    {
        if($date=='')
        {
            $this->db->select("annonces.*,utilisateur.*,photo.*, annonces.NOMVILLEDEPART,  annonces.NOMVILLEARRIVEE from annonces inner join utilisateur on annonces.NUMUSER = utilisateur.NUMUSER  inner join photo on photo.IDPHOTO=utilisateur.IDPHOTO  where annonces.TYPE_ANNONCE='$categorie' AND utilisateur.TYPE_UTILISATEUR='PART' AND UPPER(annonces.NOMVILLEARRIVEE) like UPPER('%$villearrivee%') and UPPER(annonces.NOMVILLEDEPART) like UPPER('%$villedepart%') ");

        }
        else
        {

            $format= '%Y-%m-%d';
            $this->db->select("annonces.*,utilisateur.*,photo.*, annonces.NOMVILLEARRIVEE,  annonces.NOMVILLEDEPART from annonces inner join utilisateur on annonces.NUMUSER = utilisateur.NUMUSER  inner join photo on photo.IDPHOTO=utilisateur.IDPHOTO  where annonces.TYPE_ANNONCE='$categorie' AND  utilisateur.TYPE_UTILISATEUR='PART' AND annonces.NOMVILLEARRIVEE  like '%$villearrivee%' and annonces.NOMVILLEDEPART like '%$villedepart%' and annonces.DATEDEBUTANNONCE BETWEEN '$date' AND date_add('$date', INTERVAL 30 DAY)",FALSE);

        }
        $q=$this->db->get();
       /* if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                $data[]=$row;
            }
            return $data;
        }*/


        $i=0;
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                //$experience['experience']=$this->utilisateur_model->get_experience($row->NUMUSER);
                $data[$i]=$row;
                $data[$i]->EXPERIENCE=$this->utilisateur_model->get_experience($row->NUMUSER);
                $i++;
            }
            return $data;
        }


    }


    function find_by_ville_depart_and_ville_arrivee_pro($villedepart,$villearrivee,$categorie,$date)
    {
        if($date=='')
        {
            $this->db->select("annonces.*,utilisateur.NUMUSER,utilisateur.IDPHOTO,utilisateur.PSEUDOUSER,utilisateur.PAYSUSER,utilisateur.VILLEUSER,utilisateur.ADRESSEUSER,utilisateur.CODEPOSTALUSER,utilisateur.TELUSER,utilisateur.EMAILUSER,photo.*, annonces.NOMVILLEARRIVEE,  annonces.NOMVILLEDEPART from annonces inner join utilisateur on annonces.NUMUSER = utilisateur.NUMUSER  inner join photo on photo.IDPHOTO=utilisateur.IDPHOTO  where annonces.TYPE_ANNONCE='$categorie' AND utilisateur.TYPE_UTILISATEUR='PRO' AND annonces.NOMVILLEARRIVEE like '%$villearrivee%' AND annonces.NOMVILLEdepart like '%$villedepart%' ");

        }
        else
        {
            $this->db->select("annonces.*,utilisateur.NUMUSER,utilisateur.IDPHOTO,utilisateur.PSEUDOUSER,utilisateur.PAYSUSER,utilisateur.VILLEUSER,utilisateur.ADRESSEUSER,utilisateur.CODEPOSTALUSER,utilisateur.TELUSER,utilisateur.EMAILUSER,photo.*, annonces.NOMVILLEARRIVEE, annonces.NOMVILLEDEPART from annonces inner join utilisateur on annonces.NUMUSER = utilisateur.NUMUSER  inner join photo on photo.IDPHOTO=utilisateur.IDPHOTO  where annonces.TYPE_ANNONCE='$categorie' AND  utilisateur.TYPE_UTILISATEUR='PRO' AND annonces.NOMVILLEARRIVEE  like '%$villearrivee%' AND annonces.NOMVILLEDEPART like '%$villedepart%' and annonces.DATEDEBUTANNONCE BETWEEN '$date' AND date_add('$date', INTERVAL 30 DAY) ",FALSE);
        }
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


    function find_by_ville_depart_and_ville_arrivee_user($villedepart,$villearrivee,$categorie,$date)
    {
        if($date=='')
        {
            $this->db->select("annonces.*,utilisateur.NUMUSER,utilisateur.IDPHOTO,utilisateur.PSEUDOUSER,utilisateur.PAYSUSER,utilisateur.VILLEUSER,utilisateur.ADRESSEUSER,utilisateur.CODEPOSTALUSER,utilisateur.TELUSER,utilisateur.EMAILUSER,photo.*, annonces.NOMVILLEARRIVEE,  annonces.NOMVILLEDEPART from annonces inner join utilisateur on annonces.NUMUSER = utilisateur.NUMUSER  inner join photo on photo.IDPHOTO=utilisateur.IDPHOTO  where annonces.TYPE_ANNONCE='$categorie' AND utilisateur.TYPE_UTILISATEUR='PART' AND annonces.NOMVILLEARRIVEE like '%$villearrivee%' AND annonces.NOMVILLEDEPART like '%$villedepart%' ");

        }
        else
        {
            $this->db->select("annonces.*,utilisateur.NUMUSER,utilisateur.IDPHOTO,utilisateur.PSEUDOUSER,utilisateur.PAYSUSER,utilisateur.VILLEUSER,utilisateur.ADRESSEUSER,utilisateur.CODEPOSTALUSER,utilisateur.TELUSER,utilisateur.EMAILUSER,photo.*, annonces.NOMVILLEARRIVEE, annonces.NOMVILLEDEPART from annonces inner join utilisateur on annonces.NUMUSER = utilisateur.NUMUSER  inner join photo on photo.IDPHOTO=utilisateur.IDPHOTO  where annonces.TYPE_ANNONCE='$categorie' AND  utilisateur.TYPE_UTILISATEUR='PART' AND annonces.NOMVILLEARRIVEE  like '%$villearrivee%' AND annonces.NOMVILLEDEPART like '%$villedepart%' and annonces.DATEDEBUTANNONCE BETWEEN '$date' AND DATE_ADD('$date', INTERVAL 30 DAY)",FALSE);

        }
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


    function get_all_annonce_by_user($idUser)
    {
        $this->db->select('utilisateur.*, annonces.*,photo.*, annonces.NOMVILLEARRIVEE,  annonces.NOMVILLEDEPART')
            ->from('utilisateur');

        $this->db->join('annonces', 'annonces.NUMUSER = utilisateur.NUMUSER');
        $this->db->join('photo','photo.IDPHOTO=utilisateur.IDPHOTO');
      

        $this->db->where('annonces.NUMUSER',$idUser);

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

    function get_all_annonce_transport_by_user($idUser)
    {
        $this->db->select('utilisateur.*, annonces.*,photo.*')
            ->from('utilisateur');

        $this->db->join('annonces', 'annonces.NUMUSER = utilisateur.NUMUSER');
        $this->db->join('photo','photo.IDPHOTO=utilisateur.IDPHOTO');
        $this->db->where('annonces.NUMUSER',$idUser);
        $this->db->where('annonces.TYPE_ANNONCE','Transport');

        $q=$this->db->get();
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                $experience=$this->utilisateur_model->get_experience($row->NUMUSER);
                $date['EXPERIENCE']=$experience;
                $data[]=$row;
            }
            return $data;
        }
    }

    function get_user_info_by_email($email)
    {
        $this->db->select('utilisateur.*')
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

    function get_id_user_by_email($email)
    {
        $this->db->select('utilisateur.NUMUSER')
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

    function get_id_user_by_annonce($id_annonce)
    {
        $this->db->select('annonces.NUMUSER')
            ->from('annonces');


        $this->db->where('annonces.NUMANNONCE',$id_annonce);

        $q=$this->db->get();
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
               return $row->NUMUSER;
            }

        }
    }



    function get_all_annonce_envoi_by_user($idUser)
    {
        $this->db->select('utilisateur.*, annonces.*, photo.*')
            ->from('utilisateur');

        $this->db->join('annonces', 'annonces.NUMUSER = utilisateur.NUMUSER');
        $this->db->join('photo','photo.IDPHOTO=utilisateur.IDPHOTO');
       




        $this->db->where('annonces.NUMUSER',$idUser);
        $this->db->where('annonces.TYPE_ANNONCE','Envoi');

        $q=$this->db->get();
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                $experience=$this->utilisateur_model->get_experience($row->NUMUSER);
                $date['EXPERIENCE']=$experience;
                $data[]=$row;
            }
            return $data;
        }
    }

    function addannonce($dataAnnonce)
    {
        $this->db->insert('annonces',$dataAnnonce);
        /*$id_photo=$this->db->insert_id();
        $data['IDPHOTO']=$id_photo;
        $this->db->insert('utilisateur',$data);*/
    }

    function deleteannonce($id_annonce)
    {
        $this->db->delete('annonces',array('NUMANNONCE'=>$id_annonce));
    }

    function set_annonce_to_premium($id,$data)
    {
        $this->db->where('NUMANNONCE',$id);
        $this->db->update('annonces',$data);
    }

    function get_all_annonce_premium()
    {
        $this->db->select('utilisateur.*, annonces.*,photo.*')
            ->from('utilisateur');

        $this->db->join('annonces', 'annonces.NUMUSER = utilisateur.NUMUSER');
        $this->db->join('photo','photo.IDPHOTO=utilisateur.IDPHOTO');
       



        $this->db->where('annonces.PREMIUM','1');
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

    function get_email_user_by_annonce($annonce)
    {
        $this->db->select('utilisateur.EMAILUSER')
            ->from('utilisateur');
        $this->db->join('annonces','annonces.NUMUSER=utilisateur.NUMUSER');
        $this->db->where('annonces.NUMANNONCE',$annonce);

        $row=$this->db->get()->row();
       // $row = $this->db->get_where('annonces', array('NUMANNONCE' => $annonce))->row();
        return $row->EMAILUSER;
    }




    function get_matching_annonce($paysdepart,$paysarrivee,$villedepart,$villearrivee,$datedepart,$type){
        $this->db->select('utilisateur.*, annonces.*, photo.*')
            ->from('utilisateur');

        $this->db->join('annonces', 'annonces.NUMUSER = utilisateur.NUMUSER');
        $this->db->join('photo','photo.IDPHOTO=utilisateur.IDPHOTO');
       

        if($type=='Envoi')
        {
            $this->db->where('annonces.TYPE_ANNONCE','Transport');
        }else{
            $this->db->where('annonces.TYPE_ANNONCE','Envoi');
        }
        $date=date('Y-m-d',strtotime($datedepart));
        $this->db->where('annonces.DATEDEBUTannonces BETWEEN',$date.' AND DATE_ADD('.$date.', INTERVAL 30 DAY)');


        $this->db->where('annonces.NOMVILLEDEPART',$villedepart);
        $this->db->where('annonces.NOMVILLEARRIVEE',$villearrivee);
        $this->db->or_where('pays.NOMPAYSDEPART',$paysdepart);
        $this->db->or_where('pays.NOMPAYSARRIVEE',$paysarrivee);

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


    function add_alert($data)
    {
        $this->db->insert('alertes',$data);
    }


} 