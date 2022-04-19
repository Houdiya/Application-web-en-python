#!/usr/bin/env python
# -*- coding: utf8 -*-
##########################################################################################################################################
import random
import string
from datetime import date, datetime
###########################################################################################################################################
from flask import Flask,request,render_template,redirect, url_for, session
####from datetime import datetime
#from flask.ext.restplus import Api, Resource, fields, marshal
import MySQLdb as db
from flask_restplus import Resource, Api, fields
import sqlite3
import enum
import subprocess
import sys
#########################################################################################################################################
app = Flask(__name__)
api = Api(app, version='1.0', title="Gestion des clients fibre ",
	description="Cette API permet la gestion du pilotage et de la production au service PPCF", )
parser = api.parser()
###########################################################################################################################################
					#SPG permet de creer un compte IMS  pour chaque client#
###########################################################################################################################################
@api.route('/api/v1.0/SPG/<int:ND>/<string:PW>/')
class SPG_APP(Resource):
	@api.doc(parser=parser)
	def post(self,ND,PW):
		''' Ajouter un compte'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete1 = cur.execute("select * from SPG where ND = %s", (ND,))
			if requete1:
				#return render_template('index.html')
				return 'Le compte exite'
			else:
				requete = cur.execute("insert into SPG (ND,PW) values(%s,%s)",(ND,PW))
				condb.commit()
				if requete:
					return "successful !"
				else:
					return "error !"
###########################################################################################################################################
					#GAIA permet d'enrigistrer l'etat de la demande#
###########################################################################################################################################
@api.route('/api/v1.0/GAIA/Demande_Tracee/<int:NumDemande>/<string:motif>/<string:commentaire>/')
class GAIA_Tracer_Demande(Resource):
	@api.doc(parser=parser)
	def post(self, NumDemande,motif,commentaire):
		''' Tracer une demande'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete1 = cur.execute("select * from GAIA where NumDemande = %s", (NumDemande,))
			if requete1:
				return "La demande est deja tracee !"
			else:
				requete = cur.execute("insert into GAIA (NumDemande, motif, commentaire) values (%s,%s,%s)",
				(NumDemande,motif,commentaire))
				condb.commit()
				if requete:
					return "succesfull !"
				else:
					return "erreur !"
##########################################################################################################################################
					#GAIA permet aussi d'ajouter des demande#
##########################################################################################################################################
@api.route('/api/v1.0/GAIA/Ajout_Demande/<int:NumDemande>/<string:ND>/<string:Prenom>/<string:Nom>/<string:Debit>/<string:Bouquet_Orange>/<string:TypeOlt>/')
class GAIA_Ajouter_Demande(Resource):
	@api.doc(parser=parser)
	def post(self, NumDemande,ND,Prenom,Nom,Debit,Bouquet_Orange,TypeOlt):
		''' Ajouter une demande'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete1 = cur.execute("select * from DEMANDE where NumDemande = %s", (NumDemande,))
			if requete1:
				resultat = cur.fetchone()
				return "La demande est deja enrigistree :"+str(resultat)
			else:
				requete = cur.execute("insert into DEMANDE (NumDemande,ND,Prenom,Nom,Debit,Bouquet_Orange,TypeOlt) values (%s,%s,%s,%s,%s,%s,%s)",(NumDemande,ND,Prenom,Nom,Debit,Bouquet_Orange,TypeOlt))
				condb.commit()
				if requete:
					return "succesfull !"
				else:
					return "erreur !"
##########################################################################################################################################
				#GAIA permet aussi de faire la provision de la carte VIACC pour la TV#
##########################################################################################################################################
@api.route('/api/v1.0/GAIA/Provisoning/<int:NumDemande>/<string:ND>/')
class GAIA_Provision_Carte_VIACC(Resource):
	@api.doc(parser=parser)
	def post(self, NumDemande,ND):
		''' Provision de la carte VIACC'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete1 = cur.execute("select * from CARTE_VIACC where NumDemande = %s", (NumDemande,))
			if requete1:
				resultat = cur.fetchone()
				return "La carte est deja provisionne :"+str(resultat[0])+"  "+str(resultat[1])
			else:
				Bouquet_Orange='Bouquet_OK'
				requete = cur.execute("insert into CARTE_VIACC (NumDemande,ND,Bouquet_Orange) values (%s,%s,%s)",(NumDemande,ND,Bouquet_Orange))
				condb.commit()
				if requete:
					return "succesfull !"
				else:
					return "erreur !"
##########################################################################################################################################
				#RIGHTV permet de verifier si la TV est OK d'ou le provvisioning#
##########################################################################################################################################
@api.route('/api/v1.0/RIGHTV/Provisoning/<int:NumDemande>/<string:ND>/')
class RIGHTV_Bouquet(Resource):
	@api.doc(parser=parser)
	def post(self, NumDemande,ND):
		'''Verifie la  Provision de la carte VIACC'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete1 = cur.execute("select Bouquet_Orange from CARTE_VIACC where NumDemande = %s", (NumDemande,))
			if requete1:
				return "Bouquet_OK"
			else:
				return "Bouquet_NOK"
##########################################################################################################################################
		#RiGHTV permet egalement d'augmenter le nombre de flux pour les clients disposants de plusieurs television#
##########################################################################################################################################
@api.route('/api/v1.0/RIGHTV/Flux_TV/<string:ND>/<string:Flux_TV>/')
class Augmanter_Flux(Resource):
	@api.doc(parser=parser)
	def put(self, ND,Flux_TV): 
		''' Augmenter le nombre de flux pour un utilisateur'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			Etat='TV_OK'
			cur = condb.cursor()
			requete1 = cur.execute("select * from HUAWEI  where ND = %s and Etat=%s", (ND,Etat))
			if requete1:
				cur.execute("UPDATE HUAWEI SET Flux_TV = %s WHERE ND = %s  and Etat=%s", (Flux_TV,ND,Etat))
				condb.commit()
				return "Succesfull"
			else:
				return "Erreur:verifier les parametres saisis"

##########################################################################################################################################
				#SMART_CONFIG permet d'ajouter des modems dans la base de donnees#
##########################################################################################################################################
@api.route('/api/v1.0/SMART_CONFIG/Ajouter_Modem/<string:NumSerie>/<string:ND>/<string:SousType>/<string:TypeOlt>/')
class Ajout_Modem(Resource):
	@api.doc(parser=parser)
	def post(self, NumSerie,ND,SousType,TypeOlt):
		''' Ajouter des modems dans la base de donnees'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete1 = cur.execute("select * from MODEM  where NumSerie = %s", (NumSerie,))
			if requete1:
				return "Le modem est deja enrigistrer"
			else:
				chaine = string.ascii_uppercase + string.digits
				admin = ''.join(random.choice(chaine) for i in range(8))
				password = ''.join(random.choice(chaine) for i in range(8))
				date_courante=date.today().isoformat()
				requete = cur.execute("insert into MODEM (date,NumSerie,ND,SousType,TypeOlt,admin,password) values (%s,%s,%s,%s,%s,%s,%s)",(date_courante,NumSerie,ND,SousType,TypeOlt,admin,password))
				condb.commit()
				if requete:
					return "Nouveau modem ajoute"
				else:
					return "Numero de Serie incorrect"
###########################################################################################################################################
			#SMART_CONFIG permet d'enrigistrer les configurations effectuee pour un client#
###########################################################################################################################################
@api.route('/api/v1.0/SMART_CONFIG/Ajout_Client/<string:NumSerie>/<string:TypeOlt>/<string:ND>/<string:NRO>/<string:Plaque>/<string:PBO1>/<string:PBO2>/<int:NumFibre>/<int:Slot>/<int:Port>/<int:ONT>/<string:Ville>/<string:Sous_Traitant>/<string:Tech>/<string:Commentaire1>/<string:Commentaire2>/')
class Ajout_Client(Resource):
	@api.doc(parser=parser)
	def post(self, NumSerie,TypeOlt,ND,NRO,Plaque,PBO1,PBO2,NumFibre,Slot,Port,ONT,Ville,Sous_Traitant,Tech,Commentaire1,Commentaire2):
		''' Ajouter un client dont dont les configurartions sont faites '''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			Etat='TV_OK'
			requete1 = cur.execute("select * from SMART_CLIENT  where NumSerie = %s", (NumSerie,))
			if requete1:
				return "La demande est mise en service" 
			else:
				requete = cur.execute("insert into SMART_CLIENT (NumSerie,TypeOlt,ND,NRO,Plaque,PBO1,PBO2,NumFibre,Slot,Port,ONT,Ville,Sous_Traitant,Tech,Commentaire1,Commentaire2) values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",(NumSerie,TypeOlt,ND,NRO,Plaque,PBO1,PBO2,NumFibre,Slot,Port,ONT,Ville,Sous_Traitant,Tech,Commentaire1,Commentaire2))
				condb.commit()
				if requete:
					return "Mise en service reussie"
				else:
					return "Erreur"
##########################################################################################################################################
			#SMART_CONFIG permet de donner aux techniciens les acces pour configurer le Modem#
##########################################################################################################################################
@api.route('/api/v1.0/SMART_CONFIG/Acces_Modem/<string:NumSerie>/')
class Donner_Acces(Resource):
	@api.doc(parser=parser)
	def get(self, NumSerie):
		''' Donner les acces permettant de se connecter sur le modem afin de les configurer'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete1 = cur.execute("select admin,password from MODEM  where NumSerie = %s", (NumSerie,))
			if requete1:
				resultat = cur.fetchone()
				admin=resultat[0]
				password=resultat[1]
				return "Admin: "+admin+" "+"password: "+password
			else:
				return "Modem non enrigistre"
###########################################################################################################################################
					#U200 permet de configurer la Telephonie sur les equipements HUAWEI#
###########################################################################################################################################
@api.route('/api/v1.0/U2000/VOIP/<string:ND>/')
class Conf_VOIP(Resource):
	@api.doc(parser=parser)
	def post(self, ND):
		''' configuration de la VOIP'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			Etat='VOIP_OK'
			requete1 = cur.execute("select * from HUAWEI  where ND = %s and Etat=%s", (ND,Etat))
			if requete1:
				resultat = cur.fetchone()
				return "\n La VOIP est deja configure avec les parametre suivantes \n"+str(resultat)
			else:
				IntSelection='GEM3'
				IdVlan='199'
				UserVlan='199'
				priority='5'
				ServiceType='Multi-Service vlan +802.1p'
				UpTP='VOIP_256'
				DwTP='VOIP_256'
				requete = cur.execute("insert into HUAWEI (ND,IntSelection,IdVlan,UserVlan,priority,ServiceType,UpTP,DwTP,Etat) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",(ND,IntSelection,IdVlan,UserVlan,priority,ServiceType,UpTP,DwTP,Etat))
				condb.commit()
				return "Successful"
##########################################################################################################################################
				#U200 permet de configurer l'Internet sur les equipements HUAWEI#
##########################################################################################################################################
@api.route('/api/v1.0/U2000/Internet/<string:ND>/<string:UpTP>/<string:DwTP>/')
class Conf_Internet(Resource):
	@api.doc(parser=parser)
	def post(self, ND,UpTP,DwTP):
		''' configuration de l'Internet'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			Etat='Internet_OK'
			requete1 = cur.execute("select * from HUAWEI  where ND = %s and Etat = %s", (ND,Etat))
			if requete1:
				resultat = cur.fetchone()
				return str(resultat)
				#return "\n L'Internet est deja configure avec les parametre suivantes \n"+str(resultat)
			else:
				IntSelection='GEM5'
				IdVlan='45'
				UserVlan='45'
				priority='0'
				ServiceType='Multi-Service vlan +802.1p'
				requete = cur.execute("insert into HUAWEI (ND,IntSelection,IdVlan,UserVlan,priority,ServiceType,UpTP,DwTP,Etat) values (%s,%s,%s,%s,%s,%s,%s,%s,%s)",(ND,IntSelection,IdVlan,UserVlan,priority,ServiceType,UpTP,DwTP,Etat))
				condb.commit()
				return "Successful"
############################################################################################################################################
					#U200 permet aussi de configurer la television#
############################################################################################################################################
@api.route('/api/v1.0/U2000/TV/<string:ND>/')
class Conf_TV(Resource):
	@api.doc(parser=parser)
	def post(self, ND):
		''' configuration de la TV'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			Etat='TV_OK'
			requete1 = cur.execute("select * from HUAWEI  where ND = %s and Etat = %s", (ND,Etat))
			if requete1:
				resultat = cur.fetchone()
				return " La TV est deja configure avec les parametre suivantes :"+str(resultat)
			else:
				Flux_TV='1'
				IntSelection='GEM3'
				IdVlan='400'
				UserVlan='400'
				priority='4'
				ServiceType='Multi-Service vlan +802.1p'
				UpTP='IPTU_UP'
				DwTP='IPDW_TV'
				Max_Programme='2'
				requete = cur.execute("insert into HUAWEI (ND,IntSelection,IdVlan,UserVlan,priority,ServiceType,UpTP,DwTP,Max_Programme,Etat,Flux_TV) values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",(ND,IntSelection,IdVlan,UserVlan,priority,ServiceType,UpTP,DwTP,Max_Programme,Etat,Flux_TV))
				condb.commit()
				return "Successful"
###########################################################################################################################################
					#U200 de supprimer l'ensemble  des configurations#
###########################################################################################################################################
@api.route('/api/v1.0/U2000/Casser_Config/<string:ND>/')
class Sup_Conf(Resource):
	@api.doc(parser=parser)
	def delete(self, ND):
		''' supprimer la configuration'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete1 = cur.execute("select * from HUAWEI  where ND = %s", (ND,))
			if requete1:
				requete = cur.execute("DELETE FROM HUAWEI WHERE ND = %s", (ND,))
				condb.commit()
				return "config supprime"
			else:
				return "Ce client n est pas configurer a acceder aux services:Internet,Telephonie et TV" 
############################################################################################################################################
				#U200 permet de mettre  a jour le debit pour un client disposant des services#
############################################################################################################################################
@api.route('/api/v1.0/U2000/Migration_HUAWEI/<string:ND>/<string:UpTP>/<string:DwTP>/')
class Migration(Resource):
	@api.doc(parser=parser)
	def put(self, ND,UpTP,DwTP): 
		''' Augmenter ou diminuer le debit '''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			Etat='Internet_OK'
			cur = condb.cursor()
			requete1 = cur.execute("select * from HUAWEI  where ND = %s and Etat=%s", (ND,Etat))
			if requete1:
				cur.execute("UPDATE HUAWEI SET UpTP = %s, DwTP=%s WHERE ND = %s  and Etat=%s", (UpTP,DwTP,ND,Etat))
				condb.commit()
				return "Succesfull"
			else:
				return "Nouveau client"
##########################################################################################################################################
				#U200 retourne le port le slot et le numero de l'ONT apres la configuration# 
##########################################################################################################################################
@api.route('/api/v1.0/U2000/PORT/<string:ND>/')
class Port_Huawei(Resource):
	@api.doc(parser=parser)
	def post (self, ND):
		''' Retourner les ports pour les demandes traites'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()

			requete1= cur.execute("select * from PORT where ND = %s" , (ND,))
			if requete1:
				res = cur.fetchone()
				return "Le slot le port et l'ONT_ID sont respectivement:"+str(res)
			else:
				requete0= cur.execute("select Etat from HUAWEI where ND = %s" ,(ND,))
				if requete0:
					resultat = cur.fetchall()
					chaine=str(resultat)
					if "VOIP_OK" in chaine and "Internet_OK" in chaine:
						p= random.sample(range(1,100), 3)
						slot=p[0]
						port1=p[1]
						ONT_ID=p[2]
						requete = cur.execute("insert into PORT (ND,slot,port1,ONT_ID) values(%s,%s,%s,%s)",(ND,slot,port1,ONT_ID))
						condb.commit()
						return "le slot :"+str(p[0])+" le port :"+str(p[1])+" l'ONT_ID :"+str(p[2])
					else:
						return "Verifier que toute les services sont bien configures"
				else:
					return "Configurer les services d'abord"
###########################################################################################################################################
						#AMS Declaration de l'ONT#
###########################################################################################################################################
@api.route('/api/v1.0/AMS/ONT/<int:ID>/<string:ND>/<string:OLT>/')
class AMS_ONT(Resource):
	@api.doc(parser=parser)
	def post(self,ID,ND,OLT):
		''' Creation de l'ONT'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete1 = cur.execute("select * from ONT_NOKIA where OLT = %s and ID=%s", (OLT,ID))
			if requete1:
				return "L'ONT exite!"
			else:
				if(ND.isdigit()):
					requete = cur.execute("insert into ONT_NOKIA (ID,ND,OLT) values(%s,%s,%s)",(ID,ND,OLT))
					condb.commit()
					if requete:
						return "successful !"
					else:
						return "erreur!"
				else:
					return "Veuillez saisir un numero correct"
###########################################################################################################################################
						#Creer les cartes AMS#
###########################################################################################################################################
@api.route('/api/v1.0/AMS/Carte/<string:ND>/<string:Type>/')
class AMS_Carte(Resource):
	@api.doc(parser=parser)
	def post(self,ND,Type):
		''' Creation des cartes'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete1 = cur.execute("select * from CARTE_NOKIA where ND=%s and Type=%s", (ND,Type))
			res = cur.fetchone()
			if requete1:
				return "La carte est deja configure avec les parametre suivants"+str(res[0:3])
			else:
				requete0 = cur.execute("select * from ONT_NOKIA where ND = %s", (ND,))
				if requete0:
					if Type=="Ethernet":
						NumC=1
						Number='4'
						requete = cur.execute("insert into CARTE_NOKIA (ND,NumC,Type,Number) values(%s,%s,%s,%s)",(ND,NumC,Type,Number))
						condb.commit()		
					if Type=="POST":
						NumC='2'
						Number='2'
						requete = cur.execute("insert into CARTE_NOKIA (ND,NumC,Type,Number) values(%s,%s,%s,%s)",(ND,NumC,Type,Number))
						condb.commit()		
					if Type=="VEIP":
						NumC='3'
						Number='1'
						TypeC='UNI'
						requete = cur.execute("insert into CARTE_NOKIA (ND,NumC,Type,Number,TypeC) values(%s,%s,%s,%s,%s)",(ND,NumC,Type,Number,TypeC))		
						condb.commit()
					if requete:
						return "successful !"
					else:
						return "erreur!"
				else:
					return "Veuillez creer l'ONT d'abord"
###########################################################################################################################################
			#configuration de l'internet pour les equipements NOKIA#
###########################################################################################################################################
@api.route('/api/v1.0/AMS/Internet/<string:ND>/<string:BP>/<string:QP>/')
class AMS_Internet(Resource):
	@api.doc(parser=parser)
	def post(self,ND,BP,QP):
		''' Configuration de l'internet'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete2 = cur.execute("select * from Internet_NOKIA where ND=%s", (ND,))
			res = cur.fetchone()
			if requete2:
				return "L'internet est deja configure avec les parametres suivants:"+str(res)
			else:
				Type='VEIP'
				requete1 = cur.execute("select * from ONT_NOKIA where ND = %s", (ND,))
				requete0 = cur.execute("select * from CARTE_NOKIA where ND = %s and Type = %s", (ND,Type))
				if requete1 and requete0:
					Max_N_MAC='10'
					Mode='with translation'
					port_s='0'
					port_c='45'
					Forwader='C45'
					requete = cur.execute("insert into Internet_NOKIA (ND,BP,QP,Max_N_MAC,Mode,port_s,port_c,Forwader) values(%s,%s,%s,%s,%s,%s,%s,%s)",(ND,BP,QP,Max_N_MAC,Mode,port_s,port_c,Forwader))
					condb.commit()
					if requete:
						return "successful !"
					else:
						return "erreur!"
				else:
					return "Verifiez que l'ONT et la carte sont cree"

###########################################################################################################################################
					#Configuration de la TV pour les equipements NOKIA#		
###########################################################################################################################################
@api.route('/api/v1.0/AMS/TV/<string:ND>/<string:BP>/<string:QP>/')
class AMS_TV(Resource):
	@api.doc(parser=parser)
	def post(self,ND,BP,QP):
		''' Configuration de l'internet'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete2 = cur.execute("select * from TV_NOKIA where ND=%s", (ND,))
			res = cur.fetchone()
			if requete2:
				return "La TV est deja configure avec les parametres suivants:"+str(res)
			else:
				Type='VEIP'
				requete1 = cur.execute("select * from ONT_NOKIA where ND = %s", (ND,))
				requete0 = cur.execute("select * from CARTE_NOKIA where ND = %s and Type = %s", (ND,Type))
				if requete1 and requete0:
					Max_N_Chanel='4'
					port_s='0'
					port_c='400'
					Forwader='C400'
					requete = cur.execute("insert into TV_NOKIA (ND,BP,QP,port_s,port_c,Forwader,Max_N_Chanel) values(%s,%s,%s,%s,%s,%s,%s)",(ND,BP,QP,port_s,port_c,Forwader,Max_N_Chanel))
					condb.commit()
					if requete:
						return "successful !"
					else:
						return "erreur!"
				else:
					return "Verifiez que l'ONT et la carte sont cree"
###########################################################################################################################################
						#Configuration de la VOIP#
###########################################################################################################################################
@api.route('/api/v1.0/AMS/VOIP/<string:ND>/')
class AMS_VOIP(Resource):
	@api.doc(parser=parser)
	def post(self,ND):
		''' Configuration de l'internet'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete2 = cur.execute("select * from VOIP_NOKIA where ND=%s", (ND,))
			res = cur.fetchone()
			if requete2:
				return "La VOIP est deja configure avec les parametres suivants:"+str(res)
			else:
				Type='VEIP'
				requete1 = cur.execute("select * from ONT_NOKIA where ND = %s", (ND,))
				requete0 = cur.execute("select * from CARTE_NOKIA where ND = %s and Type = %s", (ND,Type))
				if requete1 and requete0:
					BP='VOIP'
					port_s='0'
					port_c='199'
					Forwader='C199'
					requete = cur.execute("insert into VOIP_NOKIA (ND,BP,port_s,port_c,Forwader) values(%s,%s,%s,%s,%s)",(ND,BP,port_s,port_c,Forwader))
					condb.commit()
					if requete:
						return "successful !"
					else:
						return "erreur!"
				else:
					return "Verifiez que l'ONT et la carte sont cree"
##########################################################################################################################################
				#AMS retourne le port le slot et le numero de l'ONT apres la configuration# 
##########################################################################################################################################
@api.route('/api/v1.0/AMS/PORT/<string:ND>/')
class Port_NOKIA(Resource):
	@api.doc(parser=parser)
	def post (self, ND):
		''' Retourner les ports pour les demandes traites'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete1= cur.execute("select * from PORT where ND = %s" , (ND,))
			if requete1:
				res = cur.fetchone()
				return "Le slot le port et l'ONT_ID sont respectivement:"+str(res)
			else:
				requete1 = cur.execute("select * from Internet_NOKIA where ND = %s", (ND,))
				requete2 = cur.execute("select * from VOIP_NOKIA where ND = %s", (ND,))
				requete3 = cur.execute("select * from TV_NOKIA where ND = %s", (ND,))
				if requete1 and requete2 and requete3:
					requete = cur.execute("select * from ONT_NOKIA where ND = %s", (ND,)) 
					res = cur.fetchone()
					ONT_ID=str(res[0])	
					p= random.sample(range(1,100), 2)
					slot=p[0]
					port1=p[1]
					requete = cur.execute("insert into PORT (ND,slot,port1,ONT_ID) values(%s,%s,%s,%s)",(ND,slot,port1,ONT_ID))
					condb.commit()
					if requete:
						return "le slot :"+str(p[0])+" le port :"+str(p[1])+" l'ONT_ID :"+str(res[0])
					else:
						return "erreur"
				else:
					return "Verifier que tous les services sont bien configures"
###########################################################################################################################################
						#Casser la configuration avec AMS#
###########################################################################################################################################
@api.route('/api/v1.0/AMS/Sup_Conf/<string:ND>/')
class Sup_Conf(Resource):
	@api.doc(parser=parser)
	def delete(self, ND):
		''' supprimer la configuration'''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete1 = cur.execute("select * from Internet_NOKIA where ND = %s", (ND,))
			requete2 = cur.execute("select * from VOIP_NOKIA where ND = %s", (ND,))
			requete3 = cur.execute("select * from TV_NOKIA where ND = %s", (ND,))
			if requete1 and requete2 and requete3:
				requete3 = cur.execute("DELETE FROM Internet_NOKIA WHERE ND = %s", (ND,))
				requete4 = cur.execute("DELETE FROM TV_NOKIA WHERE ND = %s", (ND,))
				requete5 = cur.execute("DELETE FROM VOIP_NOKIA WHERE ND = %s", (ND,))
				condb.commit()
				if requete3 and requete4 and requete5:
					return "config supprime"
				else:
					return "erreur"
			else:
				return "Ce client n est pas configurer a acceder aux services:Internet,Telephonie et TV" 
###########################################################################################################################################
						#Migration avec AMS#
###########################################################################################################################################
@api.route('/api/v1.0/AMS/Migration/<string:ND>/<string:BP>/<string:QP>/')
class Migration(Resource):
	@api.doc(parser=parser)
	def put(self, ND,BP,QP): 
		''' Augmenter ou diminuer le debit '''
		condb = db.connect('localhost', 'bouki', 'passer', 'sonatel')
		with condb:
			cur = condb.cursor()
			requete1 = cur.execute("select * from Internet_NOKIA  where ND = %s", (ND,))
			if requete1:
				cur.execute("UPDATE Internet_NOKIA SET BP = %s, QP=%s WHERE ND = %s ", (BP,QP,ND))
				condb.commit()
				return "Succesfull"
			else:
				return "Nouveau client"
###########################################################################################################################################
if __name__ == '__main__':
	app.run(
	debug=True,
	host="0.0.0.0",
	port=int("5000")
)
