<?php

class Avis_model  extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    function get_last_avis($iduser)
    {
        $this->db->select("avis.*,photo.*,utilisateur.NOMUSER, utilisateur.PRENOMUSER from avis inner join utilisateur on avis.NUMUSERDONNANTAVIS=utilisateur.NUMUSER inner join photo on photo.IDPHOTO=utilisateur.IDPHOTO where avis.NUMUSER='$iduser'");
        $this->db->limit(5, 0);
        $this->db->order_by("DATEAJOUTAVIS","DESC");
        $q=$this->db->get();

        if($q->num_rows()>0)
        {
            foreach($q->result() as $rows)
            {
                $data[]=$rows;
            }
            return $data;
        }

    }

    function add_avis($data)
    {
        $this->db->insert('avis',$data);
    }

    function get_avg_avis($iduser, $type_connexion){
        $this->db->select_avg('NOTE','NOTE');
        $this->db->from('avis');
        if($type_connexion == "N"){
            $this->db->join('utilisateur', 'avis.NUMUSER = utilisateur.NUMUSER');
            $this->db->where('avis.NUMUSER',$iduser);
        }else{
            $this->db->join('utilisateursfbk', 'avis.NUMFBKUSER = utilisateursfbk.NUMFBKUSER');
            $this->db->where('avis.NUMFBKUSER',$iduser);
        }

        $q= $this->db->get();
        return $q->row()->NOTE;
    }
    function get_number_avis($iduser, $type_connexion){
        $this->db->select('COUNT(avis.NUMAVIS)')
            ->from('avis');
        if($type_connexion == "N"){
            $this->db->where('avis.NUMUSER',$iduser);
        }else{
            $this->db->where('avis.NUMFBKUSER',$iduser);  
        }
        $q=$this->db->count_all_results();
        return $q;

    }


    function get_number_avis_by_user_for_annonce($iduser,$idannonce)
    {
        $this->db->select('avis.NUMAVIS')
            ->from('avis');
        $this->db->join('annonces','annonces.NUMANNONCE=avis.NUMANNONCE');
        $this->db->where('avis.NUMUSERDONNANTAVIS',$iduser);
        $this->db->where('avis.NUMANNONCE',$idannonce);
        $q=$this->db->count_all_results();
        return $q;
    }

    function get_all_avis($iduser)
    {
        $this->db->select("avis.*,photo.*,utilisateur.NOMUSER,utilisateur.PRENOMUSER from avis inner join utilisateur on avis.NUMUSERDONNANTAVIS=utilisateur.NUMUSER inner join photo on photo.IDPHOTO=utilisateur.IDPHOTO where avis.NUMUSER='$iduser'");
        $this->db->order_by("DATEAJOUTAVIS","DESC");
        $q=$this->db->get();

        if($q->num_rows()>0)
        {
            foreach($q->result() as $rows)
            {
                $data[]=$rows;
            }
            return $data;
        }
    }

}