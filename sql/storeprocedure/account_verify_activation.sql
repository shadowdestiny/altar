CREATE DEFINER=`root`@`localhost` PROCEDURE `account_verify_activation`(IN `_activation` TEXT)
    NO SQL
BEGIN
DECLARE _id_user INT DEFAULT 0;

SET _id_user = (
    SELECT Usuario.id
    FROM user AS Usuario
    WHERE Usuario.activation = _activation
    AND Usuario.user_type_id = 2
    LIMIT 1

);

IF _id_user > 0 THEN

    SELECT 
    (CONCAT(Usuario.name,' ', Usuario.firstSurname,' ',Usuario.secondSurname)) AS fullname,
    Usuario.id, 
   Usuario.email, 
    Usuario.modified,
    TRUE AS flag_exist
    FROM user AS Usuario
    WHERE Usuario.id = _id_user;

ELSE

SELECT FALSE AS flag_exist;


END IF;


END