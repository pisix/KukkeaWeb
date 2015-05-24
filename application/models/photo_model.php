<?php
/**
 * Created by PhpStorm.
 * User: Franky
 * Date: 26/04/14
 * Time: 19:03
 */

class Photo_model  extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    function get_image_by_user($id_user)
    {
        $this->db->select('photo.*, IDPHOTO')
            ->from('photo');

        $this->db->join('utilisateur', 'photo.IDPHOTO = utilisateur.IDPHOTO');

        $this->db->where('utilisateur.NUMUSER',$id_user);


        $q=$this->db->get();
        return $q->result();


    }

    function get_image_by_user_pro($id_user)
    {
        $this->db->select('photo.*, IDPHOTO')
            ->from('photo');

        $this->db->join('professionnel', 'photo.IDPHOTO = professionnel.IDPHOTO');

        $this->db->where('professionnel.NUMUSERPRO',$id_user);

        $q=$this->db->get();
        return $q->result();

    }

    function update_photo($id,$data)
    {
        $this->db->where('IDPHOTO',$id);
        $this->db->update('photo',$data);
    }

    function get_id_photo($filename)
    {
        $this->db->select('photo.IDPHOTO')
            ->from('photo');
        $this->db->where('photo.CHEMINPHOTO',$filename);
        $q=$this->db->get();
        foreach($q->result() as $row)
        {
            return $row->IDPHOTO;
        }
    }

    function get_nom_photo($email)
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

} 