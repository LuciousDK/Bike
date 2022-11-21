#
# Add fields to table 'tt_content'
#
CREATE TABLE tt_content (
  tx_bikeprovider_generatedurl varchar(255) DEFAULT '' NOT NULL,
  tx_bikeprovider_width int(11) DEFAULT '500' NOT NULL,
  tx_bikeprovider_height int(11) DEFAULT '500' NOT NULL,
);
