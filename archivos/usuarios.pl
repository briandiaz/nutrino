persona('anastasia', 'marquisia', 'caraballo', 'F', '1996-09-02', 'anastasiacar@hotmail.com','saludos').
persona('manuel', 'antonio', 'morel', 'M', '1991-01-28', 'manuelmorel28@hotmail.com','manuel').
persona('jorge', 'enmanuel', 'díaz', 'M', '1965-05-19', 'jorge@hotmail.com','jorge').
persona('lisibonny', 'francisca', 'beato', 'F', '1990-07-02', 'lisibonny@beato.com','1234').
persona('manuel', 'eminio', 'almonte', 'M', '1980-12-31', 'nestor@klktudice.com','12345').
persona('jose', 'ismael', 'reyes', 'M', '1989-04-06', 'jreyes283@gmail.com','1234').
persona('brian', 'enmanuel', 'diaz', 'M', '1992-07-02', 'brian@briandiaz.me','1234').

%----------------------------Validacion-----------------------------------

verificar(Correo,Contrasena):- persona(_,_,_,_,_,Correo,Contrasena), write('true'), !.

%----------------------------Mensaje bienvenida------------------------------

bienvenida(Correo):- persona(N,_,A,_,_,Correo,_), write(N), write(' '), write(A), !.
