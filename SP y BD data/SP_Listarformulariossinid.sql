use camposdin
go 
CREATE PROCEDURE Listar_Formulario_SID
AS
BEGIN
	SELECT * FROM formulario where borrado = 0 and vigencia = 1
END;