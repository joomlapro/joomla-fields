-- ----------------------------
-- Table structure for `jos_hello_state`
-- ----------------------------
DROP TABLE IF EXISTS `jos_hello_state`;
CREATE TABLE `jos_hello_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefix` char(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `region_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jos_hello_state
-- ----------------------------
INSERT INTO `jos_hello_state` VALUES ('1', 'AC', 'Acre', '3');
INSERT INTO `jos_hello_state` VALUES ('2', 'AL', 'Alagoas', '2');
INSERT INTO `jos_hello_state` VALUES ('3', 'AM', 'Amazonas', '3');
INSERT INTO `jos_hello_state` VALUES ('4', 'AP', 'Amapá', '3');
INSERT INTO `jos_hello_state` VALUES ('5', 'BA', 'Bahia', '2');
INSERT INTO `jos_hello_state` VALUES ('6', 'CE', 'Ceará', '2');
INSERT INTO `jos_hello_state` VALUES ('7', 'DF', 'Distrito Federal', '1');
INSERT INTO `jos_hello_state` VALUES ('8', 'ES', 'Espírito Santo', '4');
INSERT INTO `jos_hello_state` VALUES ('9', 'GO', 'Goiás', '1');
INSERT INTO `jos_hello_state` VALUES ('10', 'MA', 'Maranhão', '2');
INSERT INTO `jos_hello_state` VALUES ('11', 'MG', 'Minas Gerais', '4');
INSERT INTO `jos_hello_state` VALUES ('12', 'MS', 'Mato Grosso do Sul', '1');
INSERT INTO `jos_hello_state` VALUES ('13', 'MT', 'Mato Grosso', '1');
INSERT INTO `jos_hello_state` VALUES ('14', 'PA', 'Pará', '3');
INSERT INTO `jos_hello_state` VALUES ('15', 'PB', 'Paraíba', '2');
INSERT INTO `jos_hello_state` VALUES ('16', 'PE', 'Pernambuco', '2');
INSERT INTO `jos_hello_state` VALUES ('17', 'PI', 'Piauí', '2');
INSERT INTO `jos_hello_state` VALUES ('18', 'PR', 'Paraná', '5');
INSERT INTO `jos_hello_state` VALUES ('19', 'RJ', 'Rio de Janeiro', '4');
INSERT INTO `jos_hello_state` VALUES ('20', 'RN', 'Rio Grande do Norte', '2');
INSERT INTO `jos_hello_state` VALUES ('21', 'RO', 'Rondônia', '3');
INSERT INTO `jos_hello_state` VALUES ('22', 'RR', 'Roraima', '3');
INSERT INTO `jos_hello_state` VALUES ('23', 'RS', 'Rio Grande do Sul', '5');
INSERT INTO `jos_hello_state` VALUES ('24', 'SC', 'Santa Catarina', '5');
INSERT INTO `jos_hello_state` VALUES ('25', 'SE', 'Sergipe', '2');
INSERT INTO `jos_hello_state` VALUES ('26', 'SP', 'São Paulo', '4');
INSERT INTO `jos_hello_state` VALUES ('27', 'TO', 'Tocantins', '3');
