USE [camposdin]
GO
/****** Object:  User [admin]    Script Date: 11/17/2022 11:37:31 PM ******/
CREATE USER [admin] FOR LOGIN [admin] WITH DEFAULT_SCHEMA=[dbo]
GO
/****** Object:  Table [dbo].[contacto]    Script Date: 11/17/2022 11:37:31 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[contacto](
	[id_contacto] [int] NOT NULL,
	[id_usuario] [int] NOT NULL,
	[celular_contacto] [int] NULL,
	[telefono_contacto] [int] NULL,
	[correo_contacto] [varchar](50) NULL,
	[borrado] [tinyint] NULL,
	[vigencia] [tinyint] NULL,
 CONSTRAINT [PK_contacto] PRIMARY KEY CLUSTERED 
(
	[id_contacto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[enlaces]    Script Date: 11/17/2022 11:37:31 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[enlaces](
	[id_enlace] [int] IDENTITY(1,1) NOT NULL,
	[id_formulario] [int] NOT NULL,
	[nombre_tabla] [varchar](50) NULL,
	[nombre_campo] [varchar](50) NULL,
	[nombre_campo_form] [varchar](50) NULL,
	[visibilidad_campo] [bit] NULL,
	[borrado] [tinyint] NOT NULL,
	[vigencia] [tinyint] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_enlace] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[formulario]    Script Date: 11/17/2022 11:37:31 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[formulario](
	[id_formulario] [int] IDENTITY(1,1) NOT NULL,
	[id_usuario] [int] NOT NULL,
	[nombre_formulario] [varchar](50) NULL,
	[borrado] [tinyint] NOT NULL,
	[vigencia] [tinyint] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_formulario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[region]    Script Date: 11/17/2022 11:37:31 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[region](
	[id_region] [int] NOT NULL,
	[num_region] [int] NULL,
	[nombre_region] [varchar](50) NULL,
	[borrado] [tinyint] NULL,
	[vigencia] [tinyint] NULL,
 CONSTRAINT [PK_region] PRIMARY KEY CLUSTERED 
(
	[id_region] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[ubicacion]    Script Date: 11/17/2022 11:37:31 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ubicacion](
	[id_ubicacion] [int] NOT NULL,
	[id_usuario] [int] NOT NULL,
	[id_region] [int] NOT NULL,
	[comuna_ubicacion] [varchar](50) NULL,
	[calle_ubicacion] [varchar](50) NULL,
	[num_ubicacion] [varchar](50) NULL,
	[inmueble_ubicacion] [int] NULL,
	[borrado] [tinyint] NULL,
	[vigencia] [tinyint] NULL,
 CONSTRAINT [PK_ubicacion] PRIMARY KEY CLUSTERED 
(
	[id_ubicacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[usuario]    Script Date: 11/17/2022 11:37:31 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[usuario](
	[id_usuario] [int] NOT NULL,
	[nombre_usuario] [varchar](50) NULL,
	[apellido1_usuario] [varchar](50) NULL,
	[apellido2_usuario] [varchar](50) NULL,
	[fnacimiento_usuario] [date] NULL,
	[borrado] [tinyint] NULL,
	[vigencia] [tinyint] NULL,
 CONSTRAINT [PK_usuario] PRIMARY KEY CLUSTERED 
(
	[id_usuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[contacto]  WITH CHECK ADD  CONSTRAINT [FK_contacto_usuario] FOREIGN KEY([id_contacto])
REFERENCES [dbo].[usuario] ([id_usuario])
GO
ALTER TABLE [dbo].[contacto] CHECK CONSTRAINT [FK_contacto_usuario]
GO
ALTER TABLE [dbo].[ubicacion]  WITH CHECK ADD  CONSTRAINT [FK_ubicacion_region] FOREIGN KEY([id_ubicacion])
REFERENCES [dbo].[region] ([id_region])
GO
ALTER TABLE [dbo].[ubicacion] CHECK CONSTRAINT [FK_ubicacion_region]
GO
ALTER TABLE [dbo].[ubicacion]  WITH CHECK ADD  CONSTRAINT [FK_ubicacion_usuario] FOREIGN KEY([id_ubicacion])
REFERENCES [dbo].[usuario] ([id_usuario])
GO
ALTER TABLE [dbo].[ubicacion] CHECK CONSTRAINT [FK_ubicacion_usuario]
GO
/****** Object:  StoredProcedure [dbo].[Act_Enlace]    Script Date: 11/17/2022 11:37:31 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[Act_Enlace] @id INT, @id2 INT, @nt varchar(30), @nc varchar(30), @ncf varchar(20), @vc bit
AS 
UPDATE enlaces

SET  nombre_tabla = @nt, nombre_campo = @nc, nombre_campo_form = @ncf, visibilidad_campo = @vc

WHERE id_formulario = @id and id_enlace = @id2 
GO
/****** Object:  StoredProcedure [dbo].[Listar_Campos]    Script Date: 11/17/2022 11:37:31 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- Se crea el Stored Procedure de nombre Listar_Campos, con la variable de nombre @tabla la cual sera el nombre de la tabla que se quiere listar los campos
CREATE PROCEDURE [dbo].[Listar_Campos] @tabla nvarchar(20)
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
GO
/****** Object:  StoredProcedure [dbo].[Listar_Enlaces]    Script Date: 11/17/2022 11:37:31 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[Listar_Enlaces]
	@id INT
AS
BEGIN

SELECT * FROM enlaces WHERE enlaces.id_formulario = @id and enlaces.vigencia = 1 and enlaces.visibilidad_campo = 1;

END
GO
/****** Object:  StoredProcedure [dbo].[Listar_Formularios]    Script Date: 11/17/2022 11:37:31 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[Listar_Formularios] 
	@id INT
AS
BEGIN

SELECT * FROM formulario WHERE formulario.id_usuario = @id and vigencia = 1 and borrado = 0

END;
GO
/****** Object:  StoredProcedure [dbo].[Listar_Tablas]    Script Date: 11/17/2022 11:37:31 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[Listar_Tablas]
AS
BEGIN

select name from sys.tables
where name <> 'sysdiagrams'

END
GO
/****** Object:  StoredProcedure [dbo].[Listar_Todo_Form]    Script Date: 11/17/2022 11:37:31 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[Listar_Todo_Form] @id int
AS 
begin
SELECT * From enlaces where id_formulario = @id

END
GO
/****** Object:  StoredProcedure [dbo].[Listar_Ultimo_Form]    Script Date: 11/17/2022 11:37:31 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
Create procedure [dbo].[Listar_Ultimo_Form]
as
begin
select IDENT_CURRENT('formulario') as numero
end
GO
/****** Object:  StoredProcedure [dbo].[Listar_Usuario]    Script Date: 11/17/2022 11:37:31 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[Listar_Usuario] @id int
AS
BEGIN 
	SELECT *
	FROM usuario 
	WHERE id_usuario = @id
END;
GO
