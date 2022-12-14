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
	clients text,
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
  bicycles int(11) DEFAULT '0' NOT NULL,
  PRIMARY KEY (uid),
  KEY parent (pid)
);

#
# Table structure for table 'tx_pepebike_feuser_bicycle_mm'
#
CREATE TABLE tx_pepebike_feuser_bicycle_mm (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);

#
# Add field 'tx_pepebike_bicycles' to table 'fe_users'
#
CREATE TABLE fe_users (
  tx_pepebike_bicycles text
);
