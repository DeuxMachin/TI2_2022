use camposdin
go
create procedure Listar_Ultimo_Form
as
begin
select IDENT_CURRENT('formulario') as numero
end