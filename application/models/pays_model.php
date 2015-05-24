<?php
/**
 * Created by PhpStorm.
 * User: Franky
 * Date: 29/04/14
 * Time: 19:54
 */
class Pays_model  extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    function read()
    {
       $this->db->from('pays');
        $this->db->order_by("NOMPAYS","asc");
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


    function get_pays()
    {
        $this -> db -> select('NUMPAYS, NOMPAYS');
        $this->db->from('pays');
        $this->db->order_by("NOMPAYS","asc");
        $query = $this->db->get();

        $countries = array();

        if ($query -> result()) {
            foreach ($query->result() as $country) {
                $countries[$country ->NUMPAYS] = $country->NOMPAYS;
            }
            return $countries;
        } else {
            return FALSE;
        }

    }

    function get_ville_arrivee_from_pays($pays)
    {
        $q = $this->db->query("SELECT NOMVILLEARRIVEE FROM VILLEARRIVEE INNER JOIN pays ON VILLEARRIVEE.NUMPAYS=PAYS.NUMPAYS WHERE NOMPAYS = '{$pays}'");

        if ($q->num_rows > 0) {
            return $q->result();
        }
    }


    function get_ville_depart_from_pays($pays)
    {
        $q = $this->db->query("SELECT NOMVILLEDEPART FROM VILLEDEPART INNER JOIN pays ON VILLEDEPART.NUMPAYS=PAYS.NUMPAYS WHERE NOMPAYS = '{$pays}'");

        if ($q->num_rows > 0) {
            return $q->result();
        }
    }



    function get_nom_pays_by_ville($nomville)
    {
        $this->db->select('pays.NOMPAYS')
            ->from('pays');
        $this->db->join('villedepart', 'pays.NUMPAYS = villedepart.NUMPAYS');



        $this->db->where('villedepart.NOMVILLEDEPART',$nomville);

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

    function get_nom_pays_by_id_ville($idville)
    {
        $this->db->select('pays.NOMPAYS')
            ->from('pays');
        $this->db->join('villedepart', 'pays.NUMPAYS = villedepart.NUMPAYS');



        $this->db->where('villedepart.NUMVILLEDEPART',$idville);

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
}