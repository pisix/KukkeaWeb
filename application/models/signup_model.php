<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    /*function adduser($data,$photo_data)
    {

        $this->db->insert('photo',$photo_data);
        $id_photo=$this->db->insert_id();
        $data['IDPHOTO']=$id_photo;
        //$sql2 = "INSERT INTO photo(NUMUSER, CHEMINPHOTO) VALUES ($id_user, ?)";
        $this->db->insert('utilisateur',$data);
        //$this->db->query($sql2,$photo_data);

    }
*/
    function check_id($email,$password)
    {
        $this->db->where('EMAILUSER',$email);
        $this->db->where('MOTDEPASSEUSER',md5($password));
        $q=$this->db->get('utilisateur');
        if($q->num_rows()>0)
        {
            return true;
        }
    }

    function check_confirm_inscription($email)
    {
        $this->db->where('EMAILUSER',$email);
        $this->db->where('CONFIRMINSCRIPTIONEMAIL','');
        $q=$this->db->get('utilisateur');
        if($q->num_rows()>0)
        {
            return true;
        }
    }

    function check_confirm_inscription_courrier($email)
    {
        $zero=0;
        $this->db->where('EMAILUSER',$email);
        $this->db->where('CONFIRMINSCRIPTIONCOURRIER',null);
        $this->db->or_where('CONFIRMINSCRIPTIONCOURRIER', $zero);
        $q=$this->db->get('utilisateur');
        if($q->num_rows()>0)
        {
            return true;
        }
    }

    function check_confirm_inscription_phone($id)
    {
        $zero=0;
        $this->db->where('NUMUSER',$id);
        $this->db->where('VERIFNUMTEL', $zero);
        $q=$this->db->get('utilisateur');
        if($q->num_rows()>0)
        {
            return true;
        }

    }

    function get_nom_prenom_user_by_email($email)
    {
        $this->db->where('EMAILUSER',$email);
        $q=$this->db->get('utilisateur');
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                $dataUser[]=$row;
            }
        }
        return $dataUser;
    }

    function update_last_connexion($email,$data)
    {
        $this->db->where('EMAILUSER',$email);
        $this->db->update('utilisateur',$data);
    }

}
