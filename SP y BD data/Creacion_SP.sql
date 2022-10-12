USE [camposdin]
GO
-- Se crea el Stored Procedure de nombre Listar_Campos, con la variable de nombre @tabla la cual sera el nombre de la tabla que se quiere listar los campos
CREATE PROCEDURE Listar_Campos @tabla nvarchar(20)
AS
BEGIN
	-- Se selecciona el nombre de la columna
	SELECT COLUMN_NAME
	-- Desde la informacion de las columnas 
	FROM Information_Schema.Columns
	-- Donde el nombre de la tabla es igual a la variable anteriormente creada
	WHERE TABLE_NAME = @tabla
END;

-- Para la ejecucion en sql: EXEC Listar_Campos @tabla = 'nombre de la tabla'
