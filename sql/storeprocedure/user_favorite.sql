CREATE DEFINER=`root`@`localhost` PROCEDURE `user_favorite`(`_language` VARCHAR(2), `_user_id` INT)
BEGIN

    IF _language = 'es' THEN
    
        SELECT 
            v.id,
            v.previewThumPath,
            v.price,
            v.offerPrice,
            ( SELECT text_spanish FROM text_language WHERE id = language_title_id ) AS title
        FROM 
            favorite_user AS fu LEFT JOIN video AS v 
            ON fu.video_id = v.id
        WHERE
            user_id = _user_id;
        
    ELSEIF _language = 'en' THEN
    
        SELECT 
            v.id,
            v.previewThumPath,
            v.price,
            v.offerPrice,
            ( SELECT text_english FROM text_language WHERE id = language_title_id ) AS title
        FROM 
            favorite_user AS fu LEFT JOIN video AS v 
            ON fu.video_id = v.id
        WHERE
            user_id = _user_id; 
        
    END IF;
    
    
END