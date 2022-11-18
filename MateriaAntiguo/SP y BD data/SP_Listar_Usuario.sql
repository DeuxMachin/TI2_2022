USE camposdin 
GO
CREATE PROCEDURE Listar_Usuario @id int
AS
BEGIN 
	SELECT nombre_usuario
	FROM usuario 
	WHERE id_usuario = @id
END;