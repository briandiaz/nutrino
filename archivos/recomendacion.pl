
recomendacion(ID,L) :- findall(R, toda_recomendacion(ID,R),L).

%toda_recomendacion(ID,L): retorna una lista de todas las recomendaciones para cada tipo de elemento.
toda_recomendacion(ID,L) :- findall(X,tipoalimento(X),R), buscadaelementos(R,T), recomendacionalimento(ID,L,T).

%retorna dentro de la lista elemento por elemento.
buscadaelementos([H|_], H).
buscadaelementos([_|T], H) :- buscadaelementos(T, H).

%retorna la recomendacion de cada tipo de alimento incluyendo los elementos de la compra anterior
recomendacionalimento(ID,L,T) :- ((T = azucares, esdiabetico(ID)) -> (L = [],!) ; (crearlista(ID,R,T), length(R,N), random_elementos(R,N,2,L1),
	(verificar(L1) -> rec2alimento(ID,L2,T); not(verificar(L1))-> true),(not(var(L2)) -> L3 = L2 ; L3 = L1), ralimento(ID,F,T), append(F,L3,L))).

%recomienda alimentos que estan en la ultima compra
ralimento(ID, L, T):- findall([Le,Cant],(ultimacompra(ID,Le,Cant), alimento(T, Le), not(esalergico(ID,Le)), (esdiabetico(ID) -> not(alimento(azucares,Le)) ; true)),L).

%recomienda los alimentos comidos ocasionalmente y casi no comidos.
rec2alimento(ID,L,T) :- crearlista(ID,R,T), length(R,N), random_elementos(R,N,2,L1),
	(verificar(L1) -> recomendacionalimento(ID,L2,T); not(verificar(L1))-> true),(not(var(L2)) -> L = L2 ; L = L1).

%crea la lista para agregar los alimentos ocasionalmente consumidos
crearlista(ID,R,T) :-  alimento_oc(ID,L,T), alimento_no(ID,L2,T), append(L,L2,R).
alimento_oc(ID,L,T) :- atom_concat(T,ocasional,R), findall(F,call(R,ID,F), L).
alimento_no(ID,L,T) :- atom_concat(T,casinocome,R), findall(F,call(R,ID,F), L).

%nth0: busca un elemento en especifico en un indice
%pone el valor en la posicion 0 de la lista L en Elem1
%pone el valor en la posicion 0 de la lista Elem1 en N
%pone el valor en la posicion 1 de la lista L en Elem2
%pone el valor de la posicion 0 de la lista Elem2 en N
%si los elementos en la N son iguales los cambia. (pasa,pasa)
verificar(L) :- nth0(0,L,Elem1),nth0(0,Elem1,N), nth0(1,L,Elem2),nth0(0,Elem2,N).

%
random_elementos(_, _, 0, []):-!.
random_elementos(L, N, C, Res) :- Ce is C-1, random_elementos(L,N,Ce,R), X is random(N), nth0(X,L,E), Cant is random(3), (Cant =:= 0 -> append([[E,1]],R,Res) ; append([[E,Cant]],R,Res)).

%
eliminarelemento(E, L, Res) :- indice(E,I), nth0(I,L,Lista),delete(Lista,[E,_],R), replace(Lista,R,L,Res),!.

%
agregarelemento(E,L,Res) :- indice(E,I), nth0(I,L,Lista),append(Lista,[[E,1]],R), replace(Lista,R,L,Res),!.

%
indice(X,I) :- findall(Y, tipoalimento(Y),R), alimento(T,X), nth0(I,R,T),!.

%
replace(_, _, [], []).
replace(O, R, [O|T], [R|T2]) :- replace(O, R, T, T2).
replace(O, R, [H|T], [H|T2]) :- H \= O, replace(O, R, T, T2).
