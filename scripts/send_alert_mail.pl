#!/usr/bin/perl

use MIME::Lite;
use Net::SMTP_auth;
use DBI;
use strict;

my $smtphost = "ssl0.ovh.net";
my $smtpport = 465;
my $smtpuser = "kukkea\@kukkea.com";
my $smtppass = "kukkea1#";



my $driver = "mysql";
my $database = "kukkea_dev";
my $dsn = "DBI:$driver:database=$database";
my $userid = "root";
my $password = "BEBEfranky1#";

my $dbh = DBI->connect($dsn, $userid, $password ) or die $DBI::errstr;
my $sth = $dbh->prepare("SELECT VILLEARRIVEE, VILLEDEPART,EMAIL,TYPECOLIS,DATEDEPART
                        FROM alertes
                        WHERE DATEDEPART > CURDATE()");
$sth->execute() or die $DBI::errstr;
while (my @row = $sth->fetchrow_array()) {
   my ($ville_arrivee, $ville_depart,$email,$type_colis,$date_depart ) = @row;   
   #Check if string ville_arrivee contains ',' character
   my $result1 = index($ville_arrivee,',');
   my $ville_arrivee_info='';
	my $pays_arrivee_info='';
    if($result1 > -1)
    {
		my @arrivee_info=$ville_arrivee;
		foreach my $field (@arrivee_info){
			my($ville_arrivee, $pays_arrivee) = split(',', $field);
			$ville_arrivee_info=$ville_arrivee;
			$pays_arrivee_info=$pays_arrivee;
		}	
    }
	
   #Check if string ville_depart contains ',' character
    my $result2 = index($ville_depart,',');
	my $ville_depart_info='';
	my $pays_depart_info='';

	if($result2 > -1)
    {
		my @depart_info=$ville_depart;
		foreach my $field (@depart_info){
			my($ville_depart, $pays_depart) = split(',', $field);
			$ville_depart_info=$ville_depart;
			$pays_depart_info=$pays_depart;
		}	

	}

	if ($type_colis == 'Envoi')
	{
			my $req1=$dbh->prepare("SELECT u.NOMUSER, u.PRENOMUSER, u.VILLEUSER, a.NUMANNONCE, a.NOMVILLEARRIVEE, a.NOMVILLEDEPART, a.NOMPAYSDEPART, a.NOMPAYSARRIVEE, a.TITREANNONCE,a.CONTENUANNONCE,a.DATEAJOUTANNONCE, a.PRIX, a.DATEDEBUTANNONCE, a.DATEFINANNONCE, p.CHEMINPHOTO FROM utilisateur u inner join annonces a on u.NUMUSER=a.NUMUSER inner join photo p on p.IDPHOTO=u.IDPHOTO where a.type_annonce='Transport' and a.NOMVILLEDEPART LIKE ? and a.NOMVILLEARRIVEE LIKE ? and (a.NOMPAYSDEPART LIKE ? or a.NOMPAYSARRIVEE LIKE ?)");
			$req1->bind_param(1,$ville_depart_info );
			$req1->bind_param(2,$ville_arrivee_info );
			$req1->bind_param(3,$pays_depart_info );
			$req1->bind_param(4,$pays_arrivee_info );
			$req1->execute() or die $DBI::errstr;
			print "Nombre de ligne trouvées : \n" + $req1->rows;
			while (my @row = $req1->fetchrow_array()) {
				 my ($nomuser, $prenomuser,$villeuser,$numannonce,$nomvillearrivee,$nomvilledepart,$nompaysdepart,$nompaysarrivee,$titreannonce,$contenuannonce,$dateajoutannonce,$prix,$datedebutannonce,$datefinannonce,$cheminphoto ) = @row;    
			    print "*****************Annnnonce Correspondante**********************\n";
				print("Nom user annonce = $nomuser\n");
				print("Nom user annonce = $prenomuser\n");
				print("Prenom user annonce = $nomuser\n");
				print("Ville user annonce = $villeuser\n");
				print("Numero annonce = $numannonce\n");
				print("Nom ville arrivee annonce = $nomvillearrivee\n");
				print("Nom ville depart annonce = $nomvilledepart\n");
				print("Nom pays depart annonce = $nompaysdepart\n");
				print("Nom pays arrivee annonce = $nompaysarrivee\n");
				print("Titre annonce = $titreannonce\n");
				print("Contenu annonce = $contenuannonce\n");
				print("Date ajout annonce = $dateajoutannonce\n");
				print("Prix annonce = $prix\n");
				print("date debut annonce = $datedebutannonce\n");
				print("date fin annonce = $datefinannonce\n");
				print("chemin photo user annonce = $cheminphoto\n");
				print "*****************FIN Annnnonce Correspondante**********************\n";
				
				my $to = $email;
				my $from = 'alerte@kukkea.com';
				my $subject = 'Test Email';
				my $message = '<h1>$contenuannonce</h1>';
				print '*******************Initialisation parametre************* ';

				my $msg = MIME::Lite->new(
                 From     => $from,
                 To       => $to,
                 Subject  => $subject,
                 Data     => $message
                 );
				 print '*******************Message crée************* ';


				# #################################################################
				# Lets sent the Message
				# #################################################################

				my $smtp = Net::SMTP_auth->new($smtphost, Port=>$smtpport) or die "Can't connect";
				$smtp->auth('SSL', $smtpuser, $smtppass) or die "Can't authenticate:".$smtp->message();

				$smtp->mail($from) or die "Error:".$smtp->message();
				$smtp->recipient($to) or die "Error:".$smtp->message();

				$smtp->data() or die "Error:".$smtp->message();
				$smtp->datasend($msg) or die "Error:".$smtp->message();
				$smtp->dataend() or die "Error:".$smtp->message();
				$smtp->quit or die "Error:".$smtp->message();
				
				print '*******************Message envoyé************* '+$smtp->message();

                 	
			}
	}
	elsif($type_colis == 'Transport')
	{
			my $req1=$dbh->prepare("SELECTu.NOMUSER, u.PRENOMUSER, u.VILLEUSER, a.NUMANNONCE, a.NOMVILLEARRIVEE, a.NOMVILLEDEPART, a.NOMPAYSDEPART, a.NOMPAYSARRIVEE, a.TITREANNONCE,a.CONTENUANNONCE,a.DATEAJOUTANNONCE, a.PRIX, a.DATEDEBUTANNONCE, a.DATEFINANNONCE, p.CHEMINPHOTO FROM utilisateur u inner join annonces a on u.NUMUSER=a.NUMUSER inner join photo p on p.IDPHOTO=u.IDPHOTO where a.type_annonce='Envoi' and a.NOMVILLEDEPART LIKE ? and a.NOMVILLEARRIVEE LIKE ? and  (a.NOMPAYSDEPART LIKE ? or a.NOMPAYSARRIVEE LIKE ?)");
			$req1->bind_param(1,$ville_depart_info );
			$req1->bind_param(2,$ville_arrivee_info );
			$req1->bind_param(3,$pays_depart_info );
			$req1->bind_param(4,$pays_arrivee_info );
			
			$req1->execute() or die $DBI::errstr;
			print "Nombre de ligne trouvées : \n" + $req1->rows;
			while (my @row = $req1->fetchrow_array()) {
				my ($nomuser, $prenomuser,$villeuser,$numannonce,$nomvillearrivee,$nomvilledepart,$nompaysdepart,$nompaysarrivee,$titreannonce,$contenuannonce,$dateajoutannonce,$prix,$datedebutannonce,$datefinannonce,$cheminphoto ) = @row;     
			
			}


	}
	print "Ville arrivee = $ville_arrivee_info\n Ville depart = $ville_depart_info\n Email User = $email\n Type colis=$type_colis\n date de depart=$date_depart\n";
	print "Pays depart = $pays_depart_info\n Pays arrivee=$pays_arrivee_info\n";

}
$sth->finish();