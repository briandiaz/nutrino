:- dynamic persona/9.
:- dynamic cliente/3.
:- dynamic condiciones/10.

% ------------------------------Perfiles----------------------------------

%Datos personales
%Nombre
%Segundo Nombre
%Apellido
%Sexo
%Fecha de nacimiento
%Peso
%Estatura
%Cantidad de personas en la familia

persona(40212345569,'jose','ismael','reyes','M','04/06/1989',210,5.8,3).
persona(03105114205,'jose','eduardo','lora','M','26/03/1988',180,5.10,8).
persona(40220779538,'brian','enmanuel','diaz','M','07/02/1992',160,5.8,6).
persona(40224049672,'jordani','rafael','rozon','M','12/09/1990',178,5.10,7).

% ------------------------------Clientes----------------------------------

%Cedula
%Correo
%Contrasena

cliente(40212345569,'jreyes283@gmail.com','1234').
cliente(03105114205,'jsloravargas@gmail.com','karina').
cliente(40220779538,'brian@briandiaz.me','liany').
cliente(40224049672,'jordanirozon1@gmail.com','1234').


%Lista elementos alergico
%Diabetico
%Tipo Carnes
%Lista productos
