#
# Table structure for table 'tx_pepebike_domain_model_biclycle'
#
CREATE TABLE tx_pepebike_domain_model_biclycle (

  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,
  tstamp int(11) DEFAULT '0' NOT NULL,
  crdate int(11) DEFAULT '0' NOT NULL,
  cruser_id int(11) DEFAULT '0' NOT NULL,
  sorting int(11) DEFAULT '0' NOT NULL,
  deleted tinyint(4) DEFAULT '0' NOT NULL,
  hidden tinyint(4) DEFAULT '0' NOT NULL,


  color varchar(255) DEFAULT '' NOT NULL,
  model varchar(255) DEFAULT '' NOT NULL,
  wheels int(11) DEFAULT '2' NOT NULL,
  brand int(11) DEFAULT '0' NOT NULL,


  PRIMARY KEY (uid),
  KEY parent (pid)
);

#
# Table structure for table 'tx_pepebike_domain_model_brand'
#
CREATE TABLE tx_pepebike_domain_model_brand (

  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,
  tstamp int(11) DEFAULT '0' NOT NULL,
  crdate int(11) DEFAULT '0' NOT NULL,
  cruser_id int(11) DEFAULT '0' NOT NULL,
  sorting int(11) DEFAULT '0' NOT NULL,
  deleted tinyint(4) DEFAULT '0' NOT NULL,
  hidden tinyint(4) DEFAULT '0' NOT NULL,


  name varchar(255) DEFAULT '' NOT NULL,


  PRIMARY KEY (uid),
  KEY parent (pid)
);