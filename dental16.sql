-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 12 Mai 2016 à 15:05
-- Version du serveur :  5.6.24
-- Version de PHP :  5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `dental16`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_appointment`
--

CREATE TABLE IF NOT EXISTS `tbl_appointment` (
  `id_appointment` int(11) NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_hour_start` time DEFAULT NULL,
  `appointment_hour_end` time DEFAULT NULL,
  `appointment_emergency` int(1) DEFAULT NULL,
  `appointment_check` int(1) DEFAULT NULL,
  `appointment_informations` text NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`id_appointment`, `appointment_date`, `appointment_hour_start`, `appointment_hour_end`, `appointment_emergency`, `appointment_check`, `appointment_informations`, `id_patient`, `id_staff`) VALUES
(85, '2016-05-01', '09:15:00', '09:30:00', 0, 0, '', 2, 1),
(86, '2016-05-06', '07:00:00', '07:15:00', 0, 0, '', 1, 1),
(87, '2016-05-06', '07:15:00', '07:30:00', 0, 0, '', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_article`
--

CREATE TABLE IF NOT EXISTS `tbl_article` (
  `id_article` int(11) NOT NULL,
  `article_title` varchar(50) DEFAULT NULL,
  `article_content` text,
  `article_date` date DEFAULT NULL,
  `id_staff` int(11) DEFAULT NULL,
  `id_localized_tab` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_article`
--

INSERT INTO `tbl_article` (`id_article`, `article_title`, `article_content`, `article_date`, `id_staff`, `id_localized_tab`) VALUES
(4, 'Welcome to the Pricing page', '<p>Here at South Sea Dental, we offer competitive prices throughout our dentistries. We also offer a range of payment methods :</p>\n<ul>\n<li>Monthly (Interest Free)</li>\n<li>Annually (Interest Free)</li>\n</ul>\n<p>For more informations call our friendly receptionist, they are here to help you.</p>', '2015-05-18', 1, 2),
(5, 'Pricing Table', '<p>We offer you several types of treatments.</p>\r\n\n<h4><strong>Classic</strong></h4>\r\n\n<table>\r\n\n<tbody>\r\n\n<tr>\r\n\n<td><strong>Treatment</strong></td>\r\n\n<td><strong>From (&pound;)</strong></td>\r\n\n</tr>\r\n\n<tr>\r\n\n<td>Check-up</td>\r\n\n<td>50</td>\r\n\n</tr>\r\n\n<tr>\r\n\n<td>Scaling</td>\r\n\n<td>70</td>\r\n\n</tr>\r\n\n<tr>\r\n\n<td>Teeth Withening</td>\r\n\n<td>150</td>\r\n\n</tr>\n\n\n<tr>\r\n\n<td>Extraction</td>\r\n\n<td>100</td>\r\n\n</tr>\r\n\n</tbody>\r\n\n</table>', '2015-05-18', 1, 2),
(6, 'What facilities can we offer you ?', '<p>Our comprehensive service means that it is rare for us to need to refer patients outside the practice to meet their needs. This allows our patients to feel comfortable and at ease for their treatment, in familiar surroundings. We are aware that a visit to the dentist can be a cause for anxiety for many patients and we can limit this as much as possible by making patients feel at home.</p>\r\n\n<p><strong>Equipment &amp; Technology</strong></p>\r\n\n<p>If you haven''t already experienced the benefits of today''s best dentaltechnology, you''re in for a pleasant surprise. Imagine a dental office where you can have a filling done and never feel a needle or a drill. Imagine getting a perfectly crafted crown in a single appointment. And we do it with a reassuring combination of technology and integrity, of uncompromising precision and gentle compassion. We use a dazzling array of first-rate technologies for diagnosis and treatment designed to make your visits easier, quicker and possibly even fun.<br /><br />Efficiency. Precision. Comfort. These are the reasons we''ve outfitted our office with the finest dental equipment science has to offer. And you can be confident that, as new technologies emerge, we will be at the forefront of any developments that will help us provide the finest dental care for you and your family.</p>\r\n\n<p><strong>Experienced &amp; Qualified Team</strong></p>\r\n\n<p>Most members of our team have been with the practice for a number of years. Many of our nursing staff are trained by us and go on to achieve not only their dental nursing qualifications, but also post graduate certificates in areas such as radiology and dental health education. This allows for the development of a strong cohesive team. Modern healthcare models show that patient care is improved by having this type of team.</p>', '2015-05-18', 1, 4),
(7, 'Contact us', '<p><strong>To make an appointment</strong></p>\r\n\n<p>Please, call our secretariat and speak to one of our secretary who will be happy to make you an appointment or answer any questions you may have.</p>\r\n\n<p><strong>Emergency policies</strong></p>\r\n\n<p>In case of emergency, please call the emergency number before 10:00am to be receive in the day.<br />Warning, the taking-over in emergency increases 10% VAT. wtf</p>', '2015-05-18', 1, 6),
(8, 'What''s happening at South Sea Dental', '<p>Want to keep up to date with what is happening at South Sea Dental ? Look no further, we are proud to introduce our new news feature.</p>\r\n\n<p>This will be updated as soon as we have any news for you, this is our way of letting you know what it going on. Its always nice to know what is going on.</p>\r\n\n<p><strong>-Feedback</strong>: Want to share your thoughts ? Dont know where to give feedback ? Well now you can with our new feedback questionaire. Look out for these on your next visit or alternativly download a copy using the link below.</p>\r\n\n<p>You are now able to tell us your thoughts on the service you recieved at your last visit. Feel free to be as bruital or as nice as you like, they are all anonymous.</p>\r\n\n<p><strong>-New Equipment:</strong> If you haven''t already experienced the benefits of today''s best dentaltechnology, you''re in for a pleasant surprise. Imagine a dental office where you can have a filling done and never feel a needle or a drill.</p>\r\n\n<p>We are now offering our patience the most up to date equipment on offer to date to make the pleasure of coming to the dentist that little bit better.</p>\r\n\n<p><strong>-New Website</strong>: As the first bulletin on the new website, I am proud to announce thge release of the new South Sea Dental website. We hope you will enjoy the site, if you have any queries or feedback you would like to pass on, please email us on our information email address.</p>\r\n\n<p>Enjoy the new site !</p>', '2015-05-18', 1, 5),
(9, 'Gallery', '<p>Here, you can see the jobs done on our patients.</p>', '2015-05-21', 1, 3),
(12, 'Bienvenue sur la page des tarifs', '<p>Ici &agrave;&nbsp;South Sea Dental, nous offrons des prix comp&eacute;titifs parmis tous nos soins. Nous offrons aussi la possibilit&eacute;s de payer en&nbsp;:</p>\r\n\n<ul>\r\n\n<li>Mensualit&eacute;&nbsp;(Frais d''intr&ecirc;t)</li>\r\n\n<li>Annualit&eacute; (Frais d''intr&ecirc;t)</li>\n\n\n</ul>\r\n\n<p>Pour plus d''informations, appelez nos receptionnistes, ils sont la pour vous aider.</p>', '2016-03-31', 1, 8),
(14, 'Quelles installations pouvons-nous vous offrir?', '<p style="text-align: justify;">Notre service complet signifie qu''il est rare que nous devons orienter les patients en dehors de la pratique pour r&eacute;pondre &agrave; leurs besoins. Cela permet &agrave; nos patients de se sentir &agrave; l''aise pour leur traitement, dans un environnement familier. Nous sommes conscients qu''une visite chez le dentiste peut &ecirc;tre une cause d''inqui&eacute;tude pour de nombreux patients et nous pouvons limiter cela autant que possible en faisant les patients se sentent &agrave; la maison.</p>\r\n\n<h3 style="text-align: justify;"><br />&Eacute;quipement et technologie</h3>\r\n\n<p style="text-align: justify;"><br />Si vous ne l''avez pas d&eacute;j&agrave; fait l''exp&eacute;rience des avantages de la meilleure technologie dentaire d''aujourd''hui, vous &ecirc;tes dans une agr&eacute;able surprise. Imaginez un cabinet dentaire o&ugrave; vous pouvez avoir un remplissage fait et ne jamais se sentir une aiguille ou d''une perceuse. Imaginez-vous une couronne parfaitement con&ccedil;u en un seul rendez-vous. Et nous le faisons avec une combinaison rassurante de la technologie et de l''int&eacute;grit&eacute;, de pr&eacute;cision sans compromis et douce compassion. Nous utilisons un &eacute;ventail &eacute;blouissant de technologies de premier ordre pour le diagnostic et le traitement con&ccedil;u pour rendre vos visites plus facile, plus rapide et peut-&ecirc;tre m&ecirc;me amusant.</p>\r\n\n<p style="text-align: justify;"><br />Efficacit&eacute;. Pr&eacute;cision. Confort. Ce sont les raisons pour lesquelles nous avons &eacute;quip&eacute;s notre bureau avec les meilleurs scientifiques de l''&eacute;quipement dentaire a &agrave; offrir. Et vous pouvez &ecirc;tre s&ucirc;r que, comme les nouvelles technologies &eacute;mergent, nous serons &agrave; l''avant-garde de toute &eacute;volution qui nous aideront &agrave; fournir les meilleurs soins dentaires pour vous et votre famille.</p>\r\n\n<h3 style="text-align: justify;"><br />&Eacute;quipe exp&eacute;riment&eacute;e et qualifi&eacute;e</h3>\r\n\n<p style="text-align: justify;"><br />La plupart des membres de notre &eacute;quipe ont &eacute;t&eacute; &agrave; la pratique d''un certain nombre d''ann&eacute;es. Beaucoup de notre personnel infirmier sont form&eacute;s par nous et aller &agrave; obtenir non seulement leurs qualifications en soins infirmiers dentaires, mais aussi poster certificats d''&eacute;tudes sup&eacute;rieures dans des domaines tels que la radiologie et de l''&eacute;ducation de la sant&eacute; dentaire. Cela permet le d&eacute;veloppement d''une forte coh&eacute;sion d''&eacute;quipe. mod&egrave;les de soins de sant&eacute; modernes montrent que les soins aux patients est am&eacute;lior&eacute;e en ayant ce type d''&eacute;quipe.</p>', '2016-04-01', 1, 10),
(15, 'Qu''est-ce qui se passe à South Sea Dental', '<p style="text-align: justify;">Vous voulez garder &agrave; jour avec ce qui se passe au sud de la mer dentaire? Ne cherchez plus, nous sommes fiers de vous pr&eacute;senter notre nouvelle fonctionnalit&eacute; de nouvelles.</p>\r\n\n<p style="text-align: justify;"><br />Ce sera mis &agrave; jour d&egrave;s que nous avons des nouvelles pour vous, cela est notre fa&ccedil;on de vous faire savoir ce qu''il se passe. Il est toujours bon de savoir ce qui se passe.</p>\r\n\n<p style="text-align: justify;"><br />-<strong>Feedback</strong>: Vous voulez partager vos pens&eacute;es? Ne sais pas o&ugrave; donner des commentaires? Eh bien maintenant vous pouvez avec notre nouvelle r&eacute;troaction questionnaire. Attention pour ceux-ci sur votre prochaine visite ou encore t&eacute;l&eacute;charger une copie &agrave; l''aide du lien ci-dessous.</p>\r\n\n<p style="text-align: justify;"><br />Vous &ecirc;tes maintenant en mesure de nous dire vos pens&eacute;es sur le service que vous avez re&ccedil;u lors de votre derni&egrave;re visite. Sentez-vous libre d''&ecirc;tre aussi bruital ou aussi bien que vous le souhaitez, ils sont tous anonymes.</p>\r\n\n<p style="text-align: justify;"><br /><strong>-Nouveaux &eacute;quipements</strong> : Si vous ne l''avez pas d&eacute;j&agrave; fait l''exp&eacute;rience des avantages de la meilleure technologie dentaire d''aujourd''hui, vous &ecirc;tes dans une agr&eacute;able surprise. Imaginez un cabinet dentaire o&ugrave; vous pouvez avoir un remplissage fait et ne jamais se sentir une aiguille ou d''une perceuse.<br />Nous offrons maintenant notre patience la plus &agrave; l''&eacute;quipement de la date sur l''offre &agrave; ce jour pour faire le plaisir de venir chez le dentiste que peu mieux.</p>\r\n\n<p style="text-align: justify;"><br /><strong>-Nouveau Site Web</strong>: Comme le premier bulletin sur le nouveau site, je suis fier d''annoncer thge sortie du nouveau site South Sea Dental. Nous esp&eacute;rons que vous appr&eacute;cierez le site, si vous avez des questions ou des commentaires que vous souhaitez passer, s''il vous pla&icirc;t envoyez-nous sur notre adresse d''informations &eacute;lectroniques.</p>\r\n\n<p style="text-align: justify;"><br />Profitez du nouveau site!</p>', '2016-04-01', 1, 11);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_documentation`
--

CREATE TABLE IF NOT EXISTS `tbl_documentation` (
  `id_documentation` int(11) NOT NULL,
  `documentation_name` varchar(50) NOT NULL,
  `documentation_text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_documentation`
--

INSERT INTO `tbl_documentation` (`id_documentation`, `documentation_name`, `documentation_text`) VALUES
(1, 'filling', '<h1>Amalgam</h1>\r\n\n<p><img src="../../assets/images/Fillings/amalgam.jpg" alt="" width="226" height="146" /></p>\r\n\n<p><strong>Made Of : </strong>A mixture of silver, tin, zinc, copper, and mercury. Mercury is nearly 50% of the mixture.</p>\r\n\n<p><strong>Types : </strong>Traditional (non-bonded), bonded.</p>\r\n\n<p><strong>Used for : </strong>Fillings in back teeth.</p>\r\n\n<p><strong>Lasts : </strong>At least seven years, usually longer.</p>\r\n\n<p><strong>Costs : </strong>The least expensive type of restorative materia.</p>\r\n\n<p><strong>Advantages :</strong></p>\r\n\n<ul>\r\n\n<li>Amalgam fillings are strong and can withstand the forces of chewing.</li>\r\n\n<li>They are relatively inexpensive, compared with alternatives.</li>\r\n\n<li>An amalgam filling can be completed in one dental visit.</li>\r\n\n</ul>\r\n\n<p>&nbsp;</p>\r\n\n<p><strong>Disadvantages :</strong></p>\r\n\n<ul>\r\n\n<li>Amalgam doesn''t match the color of your teeth.</li>\r\n\n<li>Healthy parts of your tooth often must be removed to make a space large enough to hold an amalgam filling.</li>\r\n\n<li>Amalgam fillings can corrode or tarnish over time, causing discoloration where the filling meets the tooth.</li>\r\n\n<li>A traditional (non-bonded) amalgam filling does not bond (stick) to your tooth. The cavity preparation (the "pocket" in your tooth) developed by your dentist requires undercuts or ledges to provide retention of the filling. Your dentist may have to remove additional tooth structure to establish good retention for the filling.</li>\r\n\n<li>Some people may be allergic to mercury or be concerned about its effects, although research shows the amount of mercury exposure from fillings is similar to what people get from other sources in the environment.</li>\r\n\n</ul>\r\n\n<h1>Composite resin</h1>\r\n\n<p><img src="../../assets/images/Fillings/composite-resin.jpg" alt="" width="226" height="146" /></p>\r\n\n<p><strong>Made Of : </strong>A mixture of plastic and fine glass particles.</p>\r\n\n<p><strong>Types : </strong>Direct and indirect. Direct fillings are placed by your dentist using a bright blue light that hardens the soft material. For indirect fillings, your dentist prepares the tooth, takes an impression and a laboratory makes the filling. During a second visit, your dentist cements this filling into place.</p>\r\n\n<p><strong>Used for : </strong>Small and large fillings, especially in front teeth or the visible parts of teeth; also for inlays.</p>\r\n\n<p><strong>Lasts : </strong>At least five years.</p>\r\n\n<p><strong>Costs : </strong>More than amalgam, but less than gold.</p>\r\n\n<p><strong>Advantages :</strong></p>\r\n\n<ul>\r\n\n<li>Your fillings or inlay will match the color of your teeth.</li>\r\n\n<li>A filling can be completed in one dental visit. An inlay may require two visits.</li>\r\n\n<li>Composite fillings can bond directly to the tooth, making the tooth stronger than it would be with an amalgam filling.</li>\r\n\n<li>Less drilling is involved than with amalgam fillings because your dentist does not have to shape the space as much to hold the filling securely. The bonding process holds the composite resin in the tooth.</li>\r\n\n<li>Indirect composite fillings and inlays are heat-cured, increasing their strength.</li>\r\n\n<li>Composite resin can be used in combination with other materials, such as glass ionomer, to provide the benefits of both materials.</li>\r\n\n</ul>\r\n\n<p>&nbsp;</p>\r\n\n<p><strong>Disadvantages :</strong></p>\r\n\n<ul>\r\n\n<li>Although composite resins have become stronger and more resistant to wear, it''s not clear whether they are strong enough to last as long as amalgam fillings under the pressure of chewing</li>\r\n\n<li>The composite may shrink when placed; this can lead to more cavities in the future in areas where the filling is not making good contact with your tooth. The shrinkage is reduced when your dentist places this type of filling in thin layers.</li>\r\n\n<li>These fillings take more time to place because they are usually placed in layers. The increased time and labor involved also contribute to the higher cost (compared with amalgam fillings).</li>\r\n\n<li>Indirect fillings and inlays take at least two visits to complete. Your dentist takes impressions at the first visit and places the filling or inlay at the second visit.</li>\r\n\n<li>In large cavities, composites may not last as long as amalgam fillings.</li>\r\n\n</ul>\r\n\n<h1>Cast gold</h1>\r\n\n<p><img src="../../assets/images/Fillings/cast-gold.jpg" alt="" width="226" height="146" /></p>\r\n\n<p><strong>Made Of : </strong>Gold alloy (gold mixed with other metals).</p>\r\n\n<p><strong>Used for : </strong>Inlays and onlays, crowns.</p>\r\n\n<p><strong>Lasts : </strong>At least seven years, usually longer</p>\r\n\n<p><strong>Costs : </strong>More than most other materials; six to ten times more expensive than amalgam.</p>\r\n\n<p><strong>Advantages :</strong></p>\r\n\n<ul>\r\n\n<li>Gold doesn''t corrode.</li>\r\n\n<li>Some people like the gold color better than the silver color of amalgam.</li>\r\n\n<li>Gold fillings are durable enough to withstand chewing forces.</li>\r\n\n</ul>\r\n\n<p>&nbsp;</p>\r\n\n<p><strong>Disadvantages :</strong></p>\r\n\n<ul>\r\n\n<li>You must visit the dentist at least twice to receive a gold filling. At the first visit, the dentist makes an impression of your tooth and a temporary filling is placed. The gold filling is made from the impression and is placed at a second visit.</li>\r\n\n<li>The cost is high because of the high cost of gold and the work involved.</li>\r\n\n<li>If gold and amalgam fillings are right next to each other in your mouth, an electric current can result from interactions between the metals and your saliva, resulting in discomfort. This is called "galvanic shock."</li>\r\n\n</ul>\r\n\n<h1>Gold foil</h1>\r\n\n<p><img src="../../assets/images/Fillings/cast-gold.jpg" alt="" width="226" height="146" /></p>\r\n\n<p><strong>Made Of : </strong>Gold.</p>\r\n\n<p><strong>Used for : </strong>Small fillings in areas where you don&rsquo;t chew hard; repairing crowns.</p>\r\n\n<p><strong>Lasts : </strong>Approximately 10 to 15 years</p>\r\n\n<p><strong>Costs : </strong>Up to four times as much as amalgam</p>\r\n\n<p><strong>Advantages :</strong></p>\r\n\n<ul>\r\n\n<li>Gold foil can last a long time.</li>\r\n\n</ul>\r\n\n<p>&nbsp;</p>\r\n\n<p><strong>Disadvantages :</strong></p>\r\n\n<ul>\r\n\n<li>Gold foil restorations require great skill and attention to detail by the dentist. Improper placement of gold foil can damage the pulp or periodontal (gum) tissues.</li>\r\n\n<li>Gold foil costs more than amalgam and composite fillings.</li>\r\n\n<li>It may be difficult to find a dentist who offers gold foil as an option because it is being replaced by other materials that match the color of your teeth.</li>\r\n\n</ul>\r\n\n<h1>Ceramic</h1>\r\n\n<p><img src="../../assets/images/Fillings/cast-gold.jpg" alt="" width="226" height="146" /></p>\r\n\n<p><strong>Made Of : </strong>Porcelain, most commonly.</p>\r\n\n<p><strong>Used for : </strong>Inlays and onlays, crowns.</p>\r\n\n<p><strong>Lasts : </strong>Five to seven years.</p>\r\n\n<p><strong>Costs : </strong>Can cost as little as composite or as much or more than gold, depending on the filling.</p>\r\n\n<p><strong>Advantages :</strong></p>\r\n\n<ul>\r\n\n<li>Ceramics are tooth-colored.</li>\r\n\n<li>Ceramics are more resistant to staining and abrasion than composite resin.</li>\r\n\n</ul>\r\n\n<p>&nbsp;</p>\r\n\n<p><strong>Disadvantages :</strong></p>\r\n\n<ul>\r\n\n<li>Ceramics are more brittle than composite resin.</li>\r\n\n<li>A ceramic inlay or onlay needs to be large enough to prevent it from breaking, so the tooth must be reduced in size to make room for the extra bulk.</li>\r\n\n</ul>\r\n\n<h1>Glass Inomer</h1>\r\n\n<p><img src="../../assets/images/Fillings/cast-gold.jpg" alt="" width="226" height="146" /></p>\r\n\n<p><strong>Made Of : </strong>Acrylic and a component of glass called fluoroaluminosilicate.</p>\n\n\n<p><strong>Used for : </strong>Most commonly used as cementation for inlay fillings, but glass ionomer also is used for fillings in front teeth or to fill areas around the necks of your teeth or on roots. As filling material, glass ionomer is typically used in people with a lot of decay in the part of the tooth that extends below the gum (root caries). It is also used for filling baby teeth and as a liner for other types of fillings.</p>\r\n\n<p><strong>Lasts : </strong>Five years or more.</p>\r\n\n<p><strong>Costs : </strong>Comparable to composite resin.</p>\r\n\n<p><strong>Advantages :</strong></p>\r\n\n<ul>\r\n\n<li>Glass ionomer matches the color of the teeth, although it does not always match as well as composite resin. Resin-modified glass ionomer is usually a better match than traditional glass ionomer.</li>\r\n\n<li>In some cases, no drilling is needed to place a glass ionomer filling. This makes this type of filling useful for small children.</li>\r\n\n<li>Glass ionomers release fluoride, which can help protect the tooth from further decay.</li>\r\n\n<li>Glass ionomer restorations bond (stick) to the tooth, which helps to prevent leakage around the filling and further decay.</li>\r\n\n</ul>\r\n\n<p>&nbsp;</p>\r\n\n<p><strong>Disadvantages :</strong></p>\r\n\n<ul>\r\n\n<li>Traditional glass ionomer is significantly weaker than composite resin. It is much more likely to wear or fracture.</li>\r\n\n<li>Traditional glass ionomer does not match your tooth color as precisely as composite resin.</li>\r\n\n<li>If you are getting a resin-modified glass ionomer filling, each thin layer needs to be cured, or hardened, with a special bright blue light before the next layer can be added. This makes the tooth stronger, but can lengthen the time of the dental appointment.</li>\r\n\n</ul>'),
(2, 'crowns', '<p>Crowns</p>'),
(3, 'braces', '<h2>Traditional</h2>\r\n\n<p><img src="../../assets/images/Braces/traditional.png" alt="" width="217" height="141" /> </p>\r\n\n<p><strong>Advantages : </strong></p>\r\n\n<ul>\r\n\n<li>Least expensive type.</li>\r\n\n<li>Colored bands give kids a chance to express themselves</li>\r\n\n</ul>\r\n\n<p><strong>Disadvantages : </strong></p>\r\n\n<ul>\r\n\n<li>Most noticeable type of braces</li>\r\n\n</ul>\r\n\n<h2>Ceramic Braces</h2>\r\n\n<p><br /> <img src="../../assets/images/Braces/ceramic.png" alt="" width="217" height="141" /> </p>\r\n\n<p><strong>Advantages : </strong></p>\r\n\n<ul>\r\n\n<li>Less noticeable than metal braces.</li>\r\n\n<li>Move teeth much faster than clear plastic aligners (Invisalign).</li>\r\n\n</ul>\r\n\n<p><strong>Disadvantages : </strong></p>\r\n\n<ul>\r\n\n<li>More expensive than metal braces.</li>\r\n\n<li>Brackets can stain easily if patients don&rsquo;t care for them well.</li>\r\n\n</ul>\r\n\n<p>Ceramic braces are the same size and shape as metal braces, except that they have tooth-colored or clear brackets that blend in to teeth. Some even use tooth-colored wires to be even less noticeable. </p>\r\n\n<h2>Lingual braces</h2>\r\n\n<p><img src="../../assets/images/Braces/lingual.png" alt="" width="217" height="141" /> </p>\r\n\n<p><strong>Advantages : </strong></p>\r\n\n<ul>\n\n\n<li>Invisible from outside.</li>\r\n\n</ul>\r\n\n<p><strong>Disadvantages : </strong></p>\r\n\n<ul>\r\n\n<li>Difficult to clean.</li>\r\n\n<li>More expensive.</li>\r\n\n<li>Not appropriate for severe cases.</li>\r\n\n<li>Can be more uncomfortable at first.</li>\r\n\n<li>Regular adjustments take longer and are more difficult than with traditional braces.</li>\r\n\n</ul>\r\n\n<p>Lingual braces are the same as traditional metal braces, except that the brackets and wires are placed on the inside of teeth.</p>\r\n\n<h2>Invisalign Braces</h2>\r\n\n<p><br /> <img src="../../assets/images/Braces/invisalign.png" alt="" width="217" height="141" /> </p>\r\n\n<p><strong>Advantages : </strong></p>\r\n\n<ul>\r\n\n<li>Almost invisible.</li>\r\n\n<li>Patients can eat and drink whatever they want.</li>\r\n\n</ul>\r\n\n<p><strong>Disadvantages : </strong></p>\r\n\n<ul>\r\n\n<li>Will not work for serious dental problems.</li>\r\n\n<li>Only available for adults and teens.</li>\r\n\n<li>Not children.</li>\r\n\n<li>More expensive option.</li>\r\n\n<li>Can be easily lost and costly to replace.</li>\r\n\n<li>Treatment may potentially take longer.</li>\r\n\n</ul>\r\n\n<p>Invisalign consists of a series of 18 to 30 custom-made, mouth guard-like clear aligners. The aligners are removable and are replaced every 2 weeks.</p>');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_gender`
--

CREATE TABLE IF NOT EXISTS `tbl_gender` (
  `id_gender` int(5) NOT NULL DEFAULT '0',
  `gender` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_gender`
--

INSERT INTO `tbl_gender` (`id_gender`, `gender`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_img_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_img_gallery` (
  `id_img` int(11) NOT NULL,
  `img_title` varchar(20) DEFAULT NULL,
  `img_gallery` varchar(512) DEFAULT NULL,
  `img_caption` varchar(50) DEFAULT NULL,
  `img_date` date DEFAULT NULL,
  `id_staff` int(11) NOT NULL,
  `id_language` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_img_gallery`
--

INSERT INTO `tbl_img_gallery` (`id_img`, `img_title`, `img_gallery`, `img_caption`, `img_date`, `id_staff`, `id_language`) VALUES
(7, 'Test', 'zdazdfeghgjukjyhtrfedzsefgthrfed.jpg', 'Hello', '2016-04-04', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_information`
--

CREATE TABLE IF NOT EXISTS `tbl_information` (
  `id_info` int(11) NOT NULL,
  `info_address` varchar(100) DEFAULT NULL,
  `info_code` varchar(10) DEFAULT NULL,
  `info_city` varchar(50) DEFAULT NULL,
  `info_country` varchar(50) DEFAULT NULL,
  `info_email` varchar(50) DEFAULT NULL,
  `info_email_emergency` varchar(50) DEFAULT NULL,
  `info_phone` varchar(20) DEFAULT NULL,
  `info_phone_emergency` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_information`
--

INSERT INTO `tbl_information` (`id_info`, `info_address`, `info_code`, `info_city`, `info_country`, `info_email`, `info_email_emergency`, `info_phone`, `info_phone_emergency`) VALUES
(1, '25 South Sea', 'PO4 1EJ', 'Portsmouth', 'United Kingdom', 'info@southseadental.co.uk', 'emergency@southseadental.co.uk', '02352435687', '02352435686');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_invoice`
--

CREATE TABLE IF NOT EXISTS `tbl_invoice` (
  `id_invoice` int(11) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_amount` float DEFAULT NULL,
  `invoice_paid` float NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_job_done`
--

CREATE TABLE IF NOT EXISTS `tbl_job_done` (
  `id_job_done` int(11) NOT NULL,
  `job_complete` int(1) DEFAULT NULL,
  `job_price_incl_tax` float DEFAULT NULL,
  `job_info` varchar(100) DEFAULT NULL,
  `job_vat` float DEFAULT NULL,
  `id_treatment` int(11) NOT NULL,
  `id_invoice` int(11) DEFAULT NULL,
  `id_tooth` int(11) NOT NULL,
  `id_appointment` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_job_done`
--

INSERT INTO `tbl_job_done` (`id_job_done`, `job_complete`, `job_price_incl_tax`, `job_info`, `job_vat`, `id_treatment`, `id_invoice`, `id_tooth`, `id_appointment`) VALUES
(2, 1, 1, 'Hello', 20, 16, NULL, 13, 86),
(3, 1, 2, 'Test', 20, 6, NULL, 16, 86),
(4, 0, 2, 'Cast gold', 20, 3, NULL, 16, 86),
(6, 1, 100, '', 20, 10, NULL, 15, 86);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_language`
--

CREATE TABLE IF NOT EXISTS `tbl_language` (
  `id_language` int(11) NOT NULL,
  `language_value` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_language`
--

INSERT INTO `tbl_language` (`id_language`, `language_value`) VALUES
(1, 'english'),
(2, 'french');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_localized_tab`
--

CREATE TABLE IF NOT EXISTS `tbl_localized_tab` (
  `id_localized_tab` int(11) NOT NULL,
  `localized_tab_name` varchar(256) DEFAULT NULL,
  `id_tab` int(11) DEFAULT NULL,
  `id_language` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_localized_tab`
--

INSERT INTO `tbl_localized_tab` (`id_localized_tab`, `localized_tab_name`, `id_tab`, `id_language`) VALUES
(1, 'Home', 1, 1),
(2, 'Pricing', 2, 1),
(3, 'Gallery', 3, 1),
(4, 'Facilities', 4, 1),
(5, 'News', 5, 1),
(6, 'Contact', 6, 1),
(7, 'Accueil', 1, 2),
(8, 'Tarifs', 2, 2),
(9, 'Gallerie', 3, 2),
(10, 'Aménagement', 4, 2),
(11, 'Nouveautés', 5, 2),
(12, 'Contact', 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_opening_times`
--

CREATE TABLE IF NOT EXISTS `tbl_opening_times` (
  `id_day` int(11) NOT NULL,
  `day` varchar(15) DEFAULT NULL,
  `beginning_day` time DEFAULT NULL,
  `beginning` enum('am','pm') DEFAULT NULL,
  `end_day` time DEFAULT NULL,
  `end` enum('am','pm') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_opening_times`
--

INSERT INTO `tbl_opening_times` (`id_day`, `day`, `beginning_day`, `beginning`, `end_day`, `end`) VALUES
(1, 'monday', '08:30:00', 'am', '05:30:00', 'pm'),
(2, 'tuesday', '08:30:00', 'am', '05:30:00', 'pm'),
(3, 'wednesday', '08:30:00', 'am', '05:30:00', 'pm'),
(4, 'thursday', '08:30:00', 'am', '05:30:00', 'pm'),
(5, 'friday', '08:30:00', 'am', '05:30:00', 'pm'),
(6, 'saturday', '00:00:00', 'am', '00:00:00', 'pm'),
(7, 'sunday', '00:00:00', 'am', '00:00:00', 'pm');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_patient`
--

CREATE TABLE IF NOT EXISTS `tbl_patient` (
  `id_patient` int(11) NOT NULL,
  `patient_name` varchar(50) DEFAULT NULL,
  `patient_surname` varchar(50) DEFAULT NULL,
  `patient_DofB` date DEFAULT NULL,
  `patient_address` varchar(150) DEFAULT NULL,
  `patient_code` varchar(10) DEFAULT NULL,
  `patient_city` varchar(50) DEFAULT NULL,
  `patient_country` varchar(50) DEFAULT NULL,
  `patient_phone` varchar(20) DEFAULT NULL,
  `patient_email` varchar(50) DEFAULT NULL,
  `patient_login` varchar(50) DEFAULT NULL,
  `patient_password` varchar(255) DEFAULT NULL,
  `patient_allergies` varchar(150) DEFAULT NULL,
  `old_patient` int(1) DEFAULT NULL,
  `patient_date_leave` date DEFAULT NULL,
  `patient_reason` varchar(20) DEFAULT NULL,
  `id_gender` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_patient`
--

INSERT INTO `tbl_patient` (`id_patient`, `patient_name`, `patient_surname`, `patient_DofB`, `patient_address`, `patient_code`, `patient_city`, `patient_country`, `patient_phone`, `patient_email`, `patient_login`, `patient_password`, `patient_allergies`, `old_patient`, `patient_date_leave`, `patient_reason`, `id_gender`) VALUES
(1, 'Caly', 'Berenice', '1993-03-05', '33 St Andrews Road', 'PO5 1EP', 'Portsmouth', 'United Kingdom', '0688354516', 'bcaly@gmail.com', 'bclay35', 'bcaly35', 'Milk', 0, '0000-00-00', '', 2),
(2, 'Gauthier', 'Raphael', '1994-11-24', '33 St Andrews Road', 'PO5 1EP', 'Portsmouth', 'United Kingdom', '0688354517', 'rgauth@gmail.com', 'rgauth93', 'rgauth93', '', 0, '0000-00-00', '', 1),
(3, 'Peslier', 'Yohan', '1994-11-16', '33 St Andrews Road', 'PO5 1EP', 'Portsmouth', 'United Kingdom', '0688354519', 'yop@gmail.com', 'ypeslie24', 'ypeslie24', '', 0, '0000-00-00', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `id_payment` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_amount` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_post_staff`
--

CREATE TABLE IF NOT EXISTS `tbl_post_staff` (
  `id_post` int(11) NOT NULL,
  `post_name` varchar(20) DEFAULT NULL,
  `post_right` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_post_staff`
--

INSERT INTO `tbl_post_staff` (`id_post`, `post_name`, `post_right`) VALUES
(1, 'Doctor', 1),
(2, 'Nurse', 2),
(3, 'Secretaty', 3),
(4, 'Dentist intern', 4),
(5, 'Nurse intern', 4),
(6, 'Secretary intern', 4);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_radio`
--

CREATE TABLE IF NOT EXISTS `tbl_radio` (
  `id_radio` int(11) NOT NULL,
  `radio_name` varchar(50) DEFAULT NULL,
  `radio_img` varchar(255) DEFAULT NULL,
  `radio_caption` varchar(150) DEFAULT NULL,
  `id_patient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_staff`
--

CREATE TABLE IF NOT EXISTS `tbl_staff` (
  `id_staff` int(11) NOT NULL,
  `staff_name` varchar(50) DEFAULT NULL,
  `staff_surname` varchar(50) DEFAULT NULL,
  `staff_phone` varchar(20) DEFAULT NULL,
  `staff_email` varchar(50) DEFAULT NULL,
  `staff_login` varchar(50) DEFAULT NULL,
  `staff_password` varchar(50) DEFAULT NULL,
  `staff_fire` int(1) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_staff`
--

INSERT INTO `tbl_staff` (`id_staff`, `staff_name`, `staff_surname`, `staff_phone`, `staff_email`, `staff_login`, `staff_password`, `staff_fire`, `id_post`) VALUES
(1, 'Brahimi', 'Hakim', '02352435688', 'hakim.brahimi@southseadental.co.uk', 'hakim', 'hakim', 0, 1),
(2, 'Grantham', 'Isabelle', '02352435689', 'isabelle.grantham@southseadental.co.uk', 'isabelle', 'isabelle', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_survey`
--

CREATE TABLE IF NOT EXISTS `tbl_survey` (
  `id_survey` int(11) NOT NULL,
  `survey_answer1` varchar(50) DEFAULT NULL,
  `survey_answer2` varchar(50) DEFAULT NULL,
  `survey_answer3` varchar(50) DEFAULT NULL,
  `survey_answer4` varchar(50) DEFAULT NULL,
  `survey_answer5` varchar(50) DEFAULT NULL,
  `survey_answer6` varchar(50) DEFAULT NULL,
  `survey_answer7` varchar(50) DEFAULT NULL,
  `survey_answer8` varchar(50) DEFAULT NULL,
  `survey_answer9` varchar(50) DEFAULT NULL,
  `survey_answer10` varchar(50) DEFAULT NULL,
  `id_patient` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_survey`
--

INSERT INTO `tbl_survey` (`id_survey`, `survey_answer1`, `survey_answer2`, `survey_answer3`, `survey_answer4`, `survey_answer5`, `survey_answer6`, `survey_answer7`, `survey_answer8`, `survey_answer9`, `survey_answer10`, `id_patient`) VALUES
(1, 'internet', 'phone', '5', '4', '2', '5', '2', '0', '1', 'It''s good', 1),
(2, 'family', 'family', '4', '1', '2', '0', '1', '2', '1', 'dzadsd', 2);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_tab`
--

CREATE TABLE IF NOT EXISTS `tbl_tab` (
  `id_tab` int(11) NOT NULL,
  `tab_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_tab`
--

INSERT INTO `tbl_tab` (`id_tab`, `tab_name`) VALUES
(1, 'Home'),
(2, 'Pricing'),
(3, 'Gallery'),
(4, 'Facilities'),
(5, 'News'),
(6, 'Contact');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_tooth`
--

CREATE TABLE IF NOT EXISTS `tbl_tooth` (
  `id_tooth` int(11) NOT NULL,
  `tooth_name` varchar(50) DEFAULT NULL,
  `tooth_area` varchar(50) DEFAULT NULL,
  `tooth_coordinates` text
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_tooth`
--

INSERT INTO `tbl_tooth` (`id_tooth`, `tooth_name`, `tooth_area`, `tooth_coordinates`) VALUES
(1, 'Third Molar - Right', 'Upper', '91,200,99,197,117,203,121,214,113,227,95,227,87,220,87,209'),
(2, 'Second Molar - Right', 'Upper', '98,197,91,189,95,170,106,166,124,174,128,186,122,198,115,201'),
(3, 'First Molar - Right', 'Upper', '99,157,102,144,109,131,120,130,133,137,140,146,138,158,129,170,122,173,106,165'),
(4, 'Second Premolar - Right', 'Upper', '128,109,140,114,148,125,145,132,138,135,126,133,118,129,111,119,120,109'),
(5, 'First Premolar - Right', 'Upper', '128,89,138,86,151,89,159,102,155,110,150,113,133,110,127,105,125,97'),
(6, 'Canine - Right', 'Upper', '149,65,165,67,172,82,171,89,166,92,145,87,142,71'),
(7, 'Lateral Incisor - Right', 'Upper', '166,64,171,59,184,53,190,57,192,75,188,78,182,78,171,70'),
(8, 'Central Incisor - Right', 'Upper', '192,53,205,47,221,49,221,59,214,75,209,78,202,73,194,62'),
(9, 'Central Incisor - Left', 'Upper', '224,51,240,47,254,55,254,63,242,76,235,79,229,74,224,62'),
(10, 'Lateral Incisor - Left', 'Upper', '257,57,272,56,280,69,271,75,261,82,252,79,252,68,254,61'),
(11, 'Canine - Left', 'Upper', '283,67,298,70,302,80,299,90,279,94,270,91,272,80,278,71'),
(12, 'First Premolar - Left', 'Upper', '314,112,293,117,283,107,297,89,312,92,319,98,318,105'),
(13, 'Second Premolar - Left', 'Upper', '303,139,322,135,332,125,327,116,313,113,294,127,294,130'),
(14, 'First Molar - Left', 'Upper', '335,140,343,162,337,169,318,175,309,173,300,157,307,144,318,137,326,135'),
(15, 'Second Molar - Left', 'Upper', '317,178,336,171,345,177,347,196,342,203,326,206,316,202,312,186,314,180'),
(16, 'Third Molar - Left', 'Upper', '353,226,350,232,329,232,322,227,318,215,323,208,341,204,350,208,353,216'),
(17, 'Third Molar - Left', 'Lower', '346,326,341,345,333,350,316,344,310,338,317,318,327,315,337,316,344,320'),
(18, 'Second Molar - Left', 'Lower', '329,379,338,362,334,349,317,345,306,351,299,369,304,378,321,383'),
(19, 'First Molar - Left', 'Lower', '326,399,316,418,305,419,288,411,284,403,295,382,304,376,321,383,325,391'),
(20, 'Second Premolar - Left', 'Lower', '278,425,286,414,299,414,307,421,311,431,305,436,294,440,286,436,279,429'),
(21, 'First Premolar - Left', 'Lower', '276,458,270,446,270,439,277,436,288,437,296,443,296,453,293,457,284,459'),
(22, 'Canine - Left', 'Lower', '257,471,264,474,272,473,279,464,275,457,262,449,256,453,255,461'),
(23, 'Lateral Incisor - Left', 'Lower', '235,477,237,458,244,457,258,472,254,480,246,482,238,480'),
(24, 'Central Incisor - Left', 'Lower', '213,476,220,461,227,460,235,479,228,483,217,481'),
(25, 'Central Incisor - Right', 'Lower', '193,476,200,460,207,459,213,477,209,481,198,482'),
(26, 'Lateral Incisor - Right', 'Lower', '171,469,183,455,191,460,193,477,185,480,174,477'),
(27, 'Canine - Right', 'Lower', '150,456,167,449,173,454,169,470,157,472,150,465'),
(28, 'First Premolar - Right', 'Lower', '137,434,155,434,159,439,157,449,149,457,138,454,131,446'),
(29, 'Second Premolar - Right', 'Lower', '124,414,137,410,145,411,152,424,142,432,135,436,123,431,119,424'),
(30, 'First Molar - Right', 'Lower', '111,378,127,375,139,380,144,401,138,410,122,415,113,412,105,396,107,386'),
(31, 'Second Molar - Right', 'Lower', '102,344,118,341,128,349,134,368,126,374,110,378,101,372,94,360,98,348'),
(32, 'Third Molar - Right', 'Lower', '96,311,111,310,119,318,122,335,115,341,100,344,91,338,89,325,90,315'),
(33, 'Jaw', 'Upper', '166,229,110,228,118,219,120,207,111,200,121,200,128,186,126,174,131,170,141,149,140,140,128,133,142,136,147,130,149,122,137,112,152,114,162,103,152,90,166,93,173,88,168,69,181,79,191,81,193,63,202,76,209,78,218,75,222,60,229,76,235,79,242,78,252,65,250,78,257,83,273,75,271,85,272,91,277,95,292,93,283,104,284,112,294,119,305,116,293,126,295,136,304,140,313,140,303,149,301,156,309,174,317,177,312,183,313,196,317,204,324,207,319,213,324,229,266,230,264,209,261,190,251,173,237,164,227,161,201,173,194,186,187,229,179,229'),
(34, 'Jaw', 'Lower', '116,311,179,311,181,343,188,361,202,373,223,380,246,375,257,362,263,340,263,311,317,310,310,337,314,345,304,352,298,368,303,377,294,381,289,390,285,404,288,410,291,413,285,414,278,421,276,429,282,434,273,436,268,440,272,454,262,449,255,451,255,467,245,457,239,457,235,461,234,476,228,463,223,459,217,465,214,474,209,463,202,458,194,472,190,459,185,456,172,468,174,451,168,447,155,453,160,438,153,431,143,433,151,425,151,418,146,411,138,410,146,402,142,384,134,376,126,375,133,369,130,358,124,344,116,342,123,334,120,324');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_treatment`
--

CREATE TABLE IF NOT EXISTS `tbl_treatment` (
  `id_treatment` int(11) NOT NULL,
  `treatment_name` varchar(50) DEFAULT NULL,
  `treatment_price` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_treatment`
--

INSERT INTO `tbl_treatment` (`id_treatment`, `treatment_name`, `treatment_price`) VALUES
(1, 'Check-up', 1),
(2, 'Scaling', 1),
(3, 'Cast Gold', 2),
(4, 'Amalgam', 2),
(5, 'Composite Resin', 2),
(6, 'Ceramic', 2),
(7, 'Gold Foil', 2),
(8, 'Glass Ionomer', 2),
(9, 'All-metam', 3),
(10, 'All-ceramic', 100),
(11, 'Porcelain-fused-to-metal', 3),
(13, 'Ceramic', 4),
(14, 'Lingual Brace', 4),
(15, 'Invisalign', 4),
(16, 'Extraction', 1),
(17, 'Test', 4),
(18, 'test', 123);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_vat`
--

CREATE TABLE IF NOT EXISTS `tbl_vat` (
  `id_vat` int(11) NOT NULL,
  `rate` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tbl_vat`
--

INSERT INTO `tbl_vat` (`id_vat`, `rate`) VALUES
(1, 20);

-- --------------------------------------------------------

--
-- Structure de la table `tooth_file`
--

CREATE TABLE IF NOT EXISTS `tooth_file` (
  `id_tooth` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `tooth_extracted` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tooth_file`
--

INSERT INTO `tooth_file` (`id_tooth`, `id_patient`, `tooth_extracted`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(2, 1, 0),
(2, 2, 0),
(2, 3, 0),
(3, 1, 0),
(3, 2, 0),
(3, 3, 0),
(4, 1, 0),
(4, 2, 0),
(4, 3, 0),
(5, 1, 0),
(5, 2, 0),
(5, 3, 0),
(6, 1, 0),
(6, 2, 0),
(6, 3, 0),
(7, 1, 0),
(7, 2, 0),
(7, 3, 0),
(8, 1, 0),
(8, 2, 0),
(8, 3, 0),
(9, 1, 0),
(9, 2, 0),
(9, 3, 0),
(10, 1, 0),
(10, 2, 0),
(10, 3, 0),
(11, 1, 0),
(11, 2, 0),
(11, 3, 0),
(12, 1, 0),
(12, 2, 0),
(12, 3, 0),
(13, 1, 0),
(13, 2, 0),
(13, 3, 0),
(14, 1, 0),
(14, 2, 0),
(14, 3, 0),
(15, 1, 0),
(15, 2, 0),
(15, 3, 0),
(16, 1, 0),
(16, 2, 0),
(16, 3, 0),
(17, 1, 0),
(17, 2, 0),
(17, 3, 0),
(18, 1, 0),
(18, 2, 0),
(18, 3, 0),
(19, 1, 0),
(19, 2, 0),
(19, 3, 0),
(20, 1, 0),
(20, 2, 0),
(20, 3, 0),
(21, 1, 0),
(21, 2, 0),
(21, 3, 0),
(22, 1, 0),
(22, 2, 0),
(22, 3, 0),
(23, 1, 0),
(23, 2, 0),
(23, 3, 0),
(24, 1, 0),
(24, 2, 0),
(24, 3, 0),
(25, 1, 0),
(25, 2, 0),
(25, 3, 0),
(26, 1, 0),
(26, 2, 0),
(26, 3, 0),
(27, 1, 0),
(27, 2, 0),
(27, 3, 0),
(28, 1, 0),
(28, 2, 0),
(28, 3, 0),
(29, 1, 0),
(29, 2, 0),
(29, 3, 0),
(30, 1, 0),
(30, 2, 0),
(30, 3, 0),
(31, 1, 0),
(31, 2, 0),
(31, 3, 0),
(32, 1, 0),
(32, 2, 0),
(32, 3, 0),
(33, 1, 0),
(33, 2, 0),
(33, 3, 0),
(34, 1, 0),
(34, 2, 0),
(34, 3, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`id_appointment`), ADD KEY `FK_tbl_appointment_id_patient` (`id_patient`), ADD KEY `id_staff` (`id_staff`);

--
-- Index pour la table `tbl_article`
--
ALTER TABLE `tbl_article`
  ADD PRIMARY KEY (`id_article`), ADD KEY `FK_tbl_article_id_tab` (`id_localized_tab`), ADD KEY `FK_tbl_article_id_staff` (`id_staff`);

--
-- Index pour la table `tbl_documentation`
--
ALTER TABLE `tbl_documentation`
  ADD PRIMARY KEY (`id_documentation`);

--
-- Index pour la table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  ADD PRIMARY KEY (`id_gender`);

--
-- Index pour la table `tbl_img_gallery`
--
ALTER TABLE `tbl_img_gallery`
  ADD PRIMARY KEY (`id_img`), ADD KEY `FK_tbl_img_gallery_id_staff` (`id_staff`), ADD KEY `FK_tbl_img_gallery_id_language` (`id_language`);

--
-- Index pour la table `tbl_information`
--
ALTER TABLE `tbl_information`
  ADD PRIMARY KEY (`id_info`);

--
-- Index pour la table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id_invoice`), ADD KEY `FK_tbl_invoice_id_patient` (`id_patient`), ADD KEY `FK_tbl_invoice_id_staff` (`id_staff`);

--
-- Index pour la table `tbl_job_done`
--
ALTER TABLE `tbl_job_done`
  ADD PRIMARY KEY (`id_job_done`), ADD KEY `FK_tbl_job_done_id_treatment` (`id_treatment`), ADD KEY `FK_tbl_job_done_id_invoice` (`id_invoice`), ADD KEY `FK_tbl_job_done_id_tooth` (`id_tooth`), ADD KEY `FK_tbl_job_done_id_appointment` (`id_appointment`);

--
-- Index pour la table `tbl_language`
--
ALTER TABLE `tbl_language`
  ADD PRIMARY KEY (`id_language`);

--
-- Index pour la table `tbl_localized_tab`
--
ALTER TABLE `tbl_localized_tab`
  ADD PRIMARY KEY (`id_localized_tab`), ADD KEY `FK_tbl_localized_tab_id_language` (`id_language`), ADD KEY `FK_tbl_localized_tab_id_tab` (`id_tab`);

--
-- Index pour la table `tbl_opening_times`
--
ALTER TABLE `tbl_opening_times`
  ADD PRIMARY KEY (`id_day`);

--
-- Index pour la table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`id_patient`), ADD KEY `FK_tbl_patient_id_gender` (`id_gender`);

--
-- Index pour la table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id_payment`), ADD UNIQUE KEY `id_payment` (`id_payment`), ADD KEY `id_invoice` (`id_invoice`);

--
-- Index pour la table `tbl_post_staff`
--
ALTER TABLE `tbl_post_staff`
  ADD PRIMARY KEY (`id_post`);

--
-- Index pour la table `tbl_radio`
--
ALTER TABLE `tbl_radio`
  ADD PRIMARY KEY (`id_radio`), ADD KEY `FK_tbl_radio_id_patient` (`id_patient`);

--
-- Index pour la table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`id_staff`), ADD KEY `FK_tbl_staff_id_post` (`id_post`);

--
-- Index pour la table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  ADD PRIMARY KEY (`id_survey`), ADD KEY `FK_tbl_survey_id_patient` (`id_patient`);

--
-- Index pour la table `tbl_tab`
--
ALTER TABLE `tbl_tab`
  ADD PRIMARY KEY (`id_tab`);

--
-- Index pour la table `tbl_tooth`
--
ALTER TABLE `tbl_tooth`
  ADD PRIMARY KEY (`id_tooth`);

--
-- Index pour la table `tbl_treatment`
--
ALTER TABLE `tbl_treatment`
  ADD PRIMARY KEY (`id_treatment`), ADD KEY `FK_tbl_treatment_id_type` (`treatment_price`);

--
-- Index pour la table `tbl_vat`
--
ALTER TABLE `tbl_vat`
  ADD PRIMARY KEY (`id_vat`);

--
-- Index pour la table `tooth_file`
--
ALTER TABLE `tooth_file`
  ADD PRIMARY KEY (`id_tooth`,`id_patient`), ADD KEY `FK_tooth_file_id_patient` (`id_patient`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `id_appointment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT pour la table `tbl_article`
--
ALTER TABLE `tbl_article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `tbl_documentation`
--
ALTER TABLE `tbl_documentation`
  MODIFY `id_documentation` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `tbl_img_gallery`
--
ALTER TABLE `tbl_img_gallery`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `tbl_information`
--
ALTER TABLE `tbl_information`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `tbl_job_done`
--
ALTER TABLE `tbl_job_done`
  MODIFY `id_job_done` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `tbl_language`
--
ALTER TABLE `tbl_language`
  MODIFY `id_language` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `tbl_localized_tab`
--
ALTER TABLE `tbl_localized_tab`
  MODIFY `id_localized_tab` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `tbl_opening_times`
--
ALTER TABLE `tbl_opening_times`
  MODIFY `id_day` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `tbl_post_staff`
--
ALTER TABLE `tbl_post_staff`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `tbl_radio`
--
ALTER TABLE `tbl_radio`
  MODIFY `id_radio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `tbl_tab`
--
ALTER TABLE `tbl_tab`
  MODIFY `id_tab` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `tbl_tooth`
--
ALTER TABLE `tbl_tooth`
  MODIFY `id_tooth` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `tbl_treatment`
--
ALTER TABLE `tbl_treatment`
  MODIFY `id_treatment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `tbl_vat`
--
ALTER TABLE `tbl_vat`
  MODIFY `id_vat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `tooth_file`
--
ALTER TABLE `tooth_file`
  MODIFY `id_tooth` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
ADD CONSTRAINT `FK_tbl_appointment_id_patient` FOREIGN KEY (`id_patient`) REFERENCES `tbl_patient` (`id_patient`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tbl_appointment_id_stadd` FOREIGN KEY (`id_staff`) REFERENCES `tbl_staff` (`id_staff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_article`
--
ALTER TABLE `tbl_article`
ADD CONSTRAINT `FK_tbl_article_id_staff` FOREIGN KEY (`id_staff`) REFERENCES `tbl_staff` (`id_staff`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tbl_article_id_tab_localized` FOREIGN KEY (`id_localized_tab`) REFERENCES `tbl_localized_tab` (`id_localized_tab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_img_gallery`
--
ALTER TABLE `tbl_img_gallery`
ADD CONSTRAINT `FK_tbl_img_gallery_id_language` FOREIGN KEY (`id_language`) REFERENCES `tbl_language` (`id_language`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tbl_img_gallery_id_staff` FOREIGN KEY (`id_staff`) REFERENCES `tbl_staff` (`id_staff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
ADD CONSTRAINT `FK_tbl_invoice_id_patient` FOREIGN KEY (`id_patient`) REFERENCES `tbl_patient` (`id_patient`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tbl_invoice_id_staff` FOREIGN KEY (`id_staff`) REFERENCES `tbl_staff` (`id_staff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_job_done`
--
ALTER TABLE `tbl_job_done`
ADD CONSTRAINT `FK_tbl_job_done_id_appointment` FOREIGN KEY (`id_appointment`) REFERENCES `tbl_appointment` (`id_appointment`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tbl_job_done_id_invoice` FOREIGN KEY (`id_invoice`) REFERENCES `tbl_invoice` (`id_invoice`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tbl_job_done_id_tooth` FOREIGN KEY (`id_tooth`) REFERENCES `tbl_tooth` (`id_tooth`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tbl_job_done_id_treatment` FOREIGN KEY (`id_treatment`) REFERENCES `tbl_treatment` (`id_treatment`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_localized_tab`
--
ALTER TABLE `tbl_localized_tab`
ADD CONSTRAINT `FK_tbl_localized_tab_id_language` FOREIGN KEY (`id_language`) REFERENCES `tbl_language` (`id_language`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tbl_localized_tab_id_tab` FOREIGN KEY (`id_tab`) REFERENCES `tbl_tab` (`id_tab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_patient`
--
ALTER TABLE `tbl_patient`
ADD CONSTRAINT `FK_tbl_patient_id_gender` FOREIGN KEY (`id_gender`) REFERENCES `tbl_gender` (`id_gender`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_payment`
--
ALTER TABLE `tbl_payment`
ADD CONSTRAINT `FK_tbl_payment_id_invoice` FOREIGN KEY (`id_invoice`) REFERENCES `tbl_invoice` (`id_invoice`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_radio`
--
ALTER TABLE `tbl_radio`
ADD CONSTRAINT `FK_tbl_radio_id_patient` FOREIGN KEY (`id_patient`) REFERENCES `tbl_patient` (`id_patient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_staff`
--
ALTER TABLE `tbl_staff`
ADD CONSTRAINT `FK_tbl_staff_id_post` FOREIGN KEY (`id_post`) REFERENCES `tbl_post_staff` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tbl_survey`
--
ALTER TABLE `tbl_survey`
ADD CONSTRAINT `FK_tbl_survey_id_patient` FOREIGN KEY (`id_patient`) REFERENCES `tbl_patient` (`id_patient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tooth_file`
--
ALTER TABLE `tooth_file`
ADD CONSTRAINT `FK_tooth_file_id_patient` FOREIGN KEY (`id_patient`) REFERENCES `tbl_patient` (`id_patient`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_tooth_file_id_tooth` FOREIGN KEY (`id_tooth`) REFERENCES `tbl_tooth` (`id_tooth`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
