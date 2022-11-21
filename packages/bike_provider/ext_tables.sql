#
# Add fields to table 'tt_content'
#
CREATE TABLE tt_content (
  tx_pepeprovider_generatedurl varchar(255) DEFAULT '' NOT NULL,
  tx_pepeprovider_width int(11) DEFAULT '500' NOT NULL,
  tx_pepeprovider_height int(11) DEFAULT '500' NOT NULL,
);
