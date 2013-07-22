:- dynamic persona/10.
:- dynamic datos/2.
% :- dynamic cliente/3.
% :- dynamic condiciones/10.

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

persona(40212345569,'jose','ismael','reyes','M','04/06/1989',210,5.8,3,'jreyes283@gmail.com').
persona(03105114205,'jose','eduardo','lora','M','26/03/1988',180,5.9,8,'jsloravargas@gmail.com').
persona(40220779538,'brian','enmanuel','diaz','M','07/02/1992',160,5.8,6,'brian@briandiaz.me').
persona(40224049672,'jordani','rafael','rozon','M','12/09/1990',178,5.10,7,'jordanirozon1@gmail.com').


creardato(Tipo,Res):- concat(Tipo,'.txt',Archivo),concat('C:/xampp/htdocs/nutrino/archivos/',Archivo,Ruta),open(Ruta, read, Stream),repeat,read_line_to_codes(Stream, Codes),(Codes \= end_of_file ->  atom_codes(Res, Codes);close(Stream),!, fail).

cedula(Res):- open('C:/xampp/htdocs/nutrino/archivos/cedula.txt', read, Stream),repeat,read_line_to_codes(Stream, Codes),(Codes \= end_of_file ->  atom_codes(Res, Codes);close(Stream),!, fail).

primer_nombre(Res):- open('C:/xampp/htdocs/nutrino/archivos/primer_nombre.txt', read, Stream),repeat,read_line_to_codes(Stream, Codes),(Codes \= end_of_file ->  atom_codes(Res, Codes);close(Stream),!, fail).

segundo_nombre(Res):- open('C:/xampp/htdocs/nutrino/archivos/segundo_nombre.txt', read, Stream),repeat,read_line_to_codes(Stream, Codes),(Codes \= end_of_file ->  atom_codes(Res, Codes);close(Stream),!, fail).

apellido(Res):- open('C:/xampp/htdocs/nutrino/archivos/apellido.txt', read, Stream),repeat,read_line_to_codes(Stream, Codes),(Codes \= end_of_file ->  atom_codes(Res, Codes);close(Stream),!, fail).

fecha_nacimiento(Res):- open('C:/xampp/htdocs/nutrino/archivos/fecha_nacimiento.txt', read, Stream),repeat,read_line_to_codes(Stream, Codes),(Codes \= end_of_file ->  atom_codes(Res, Codes);close(Stream),!, fail).

sexo(Res):- open('C:/xampp/htdocs/nutrino/archivos/sexo.txt', read, Stream),repeat,read_line_to_codes(Stream, Codes),(Codes \= end_of_file ->  atom_codes(Res, Codes);close(Stream),!, fail).

peso(Res):- open('C:/xampp/htdocs/nutrino/archivos/peso.txt', read, Stream),repeat,read_line_to_codes(Stream, Codes),(Codes \= end_of_file ->  atom_codes(Res, Codes);close(Stream),!, fail).

estatura(Res):- open('C:/xampp/htdocs/nutrino/archivos/estatura.txt', read, Stream),repeat,read_line_to_codes(Stream, Codes),(Codes \= end_of_file ->  atom_codes(Res, Codes);close(Stream),!, fail).

miembros_familia(Res):- open('C:/xampp/htdocs/nutrino/archivos/miembros_familia.txt', read, Stream),repeat,read_line_to_codes(Stream, Codes),(Codes \= end_of_file ->  atom_codes(Res, Codes);close(Stream),!, fail).

correo(Res):- open('C:/xampp/htdocs/nutrino/archivos/correo.txt', read, Stream),repeat,read_line_to_codes(Stream, Codes),(Codes \= end_of_file ->  atom_codes(Res, Codes);close(Stream),!, fail).

leer_archivo(Stream,[]) :-
    at_end_of_stream(Stream).

leer_archivo(Stream,[X|L]) :-
    \+ at_end_of_stream(Stream),
    read(Stream,X),
    leer_archivo(Stream,L).
piel(Res):- open('C:/xampp/htdocs/nutrino/archivos/estatura.txt', read, Stream),repeat,read_line_to_codes(Stream, Codes),(Codes \= end_of_file ->  atom_codes(Res, Codes);close(Stream),!, fail).

:- creardato(cedula,CX),RC = CX, atom_number(RC,C), creardato(primer_nombre,P), creardato(segundo_nombre,S), creardato(apellido,A), creardato(sexo,SE), creardato(fecha_nacimiento,F), creardato(peso,PEC),PEX = PEC, atom_number(PEX,PE), creardato(estatura,EC), EX = EC, atom_number(EX,E), creardato(miembros_familia,MC),MX = MC, atom_number(MX,M),  creardato(correo,CO), assertz(persona(C,P,S,A,SE,F,PE,E,M,CO)).

% ------------------------------Clientes----------------------------------

%Cedula
%Correo
%Contrasena

cliente('jreyes283@gmail.com','1234').
cliente('jsloravargas@gmail.com','karina').
cliente('brian@briandiaz.me','liany').
cliente('jordanirozon1@gmail.com','1234').

verificar(Correo,Contrasena):- cliente(Correo,Contrasena), write('true'), !.
verificar(Correo,Contrasena):- persona(_,_,_,Correo,_,_,Contrasena), write('true'), !.

bienvenida(Correo):- persona(_,N,_,A,_,_,_,_,_,Correo), write(N), write(' '), write(A), !.

% :- assert(persona(57845464,'manin','tirapiedra','reyes','M','04/06/1989',210,58,3,'brian@hotmail.com')).


%Lista elementos alergico
%Diabetico
%Tipo Carnes
%Lista productos






