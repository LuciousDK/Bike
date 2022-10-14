#
# Table structure for table 'tx_pepebike_domain_model_bicycle'
#
CREATE TABLE tx_pepebike_domain_model_bicycle (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,
  tstamp int(11) DEFAULT '0' NOT NULL,
  crdate int(11) DEFAULT '0' NOT NULL,
  cruser_id int(11) DEFAULT '0' NOT NULL,
  sorting int(11) DEFAULT '0' NOT NULL,
  deleted tinyint(4) DEFAULT '0' NOT NULL,
  hidden tinyint(4) DEFAULT '0' NOT NULL,
  starttime int(10) unsigned NOT NULL DEFAULT 0,
  endtime int(10) unsigned NOT NULL DEFAULT 0,
  color varchar(255) DEFAULT '' NOT NULL,
  model varchar(255) DEFAULT '' NOT NULL,
  wheels int(11) DEFAULT '2' NOT NULL,
  brand int(11) DEFAULT NULL,
  categories int(11) NOT NULL DEFAULT 0,
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