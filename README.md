MyHomeChef Project

Creato con Laravel/Inertia.js/Vue3

***Per accedere all'app bisogna essere registrati obbligatoriamente***  
Idea:  
    
- Un app che permette allo CHEF (utente registrato) di pubblicare RECIPES (ricette) pubbliche o private, nella sua chef_page. Le RECIPE avranno un nome, un livello di difficoltà, la durata per eseguirle, la lista di INGREDIENTS necessari e i recipe_points (punteggio della ricetta)  
  
- Gli CHEF (utenti registrati) possono seguire altri CHEF e mettere + alle loro ricette pubbliche che aumenteranno i loro cooking_points (somma di tutti i recipe_points). Gli CHEF che premono + su una RECIPE la inseriscono nella sezione suggested_recipes di ogni CHEF  
  
- Gli CHEF hanno i Badge (gradi: principiante, appassionato, aiuto cuoco, chef, chef stellato, nonna) in base ai cooking_points  
  
- le RECIPES hanno un MEAL_TYPE opzionale (tipo di pietanza: primo, secondo, dessert, antipasto ecc) e hanno la CUISINE opzionale (tipo di cucina: esotica, italiana, cinese, giapponese, americana, balcana, creativa ecc)  
  
- ogni RECIPE ha il Nome, Descrizione, Tempo, DIFFICULTY, i Recipe_points(punteggio della ricetta, ogni volta che viene messo un +), gli INGREDIENTS (ingredienti della ricetta), gli STEPS (passaggi) con ordine modificabile, la Visibilità  
  
- ci sara una lista di DIFFICULTY da poter assegnare alla RECIPE  
  
- Ogni STEP ha il suo Step_number(per ordinarli), una o piu ACTIONS opzionale(azioni: cuoci, taglia, mescola, raffredda, congela ecc) e la descrizione dello STEP  
  
- Gli INGREDIENTS (ingredienti della ricetta) che hanno il nome e appartengono a una CATEGORY opzionale (categoria di ingrediente: carne, verdura, pesce, panificati, bevanda, spezia, frutta ecc) nella recipe_page ce la sezione timeline(scaletta) composta da STEPS(passaggi con ordine modificabile) a cui potranno essere associate una o piu ACTION_TYPE (azioni: cuoci, taglia, mescola, raffredda, congela ecc) con la descrizione di cosa fare   
  
- ci sarà una home_page dove verranno mostrate in ordine cronologico le ricette che ogni CHEF seguito pubblica assieme alle nostre.  
- se uno CHEF non segue ancora nessuno nella home_page verranno suggeriti 5 CHEF o RECEIPTS random in modo da avviare il motore del follow  
  
Entità:  
 - ADMIN: Un utente registrato speciale che può monitorare qualsiasi contenuto e ha accesso a tutte le crud o opzioni:  
	Properties:  
	> -Id  
	> -Nome  
	> -Email  
	> -Password  
  
 - USER: Lo chef utente registrato  
	Properties:  
	> -Id  
	> -Nome  
	> -Email  
	> -Password  
	> -Descrizione  
	> -Profile_picture_path  
	> -Visibilità  
	> -Badge  
	> -Cooking Points  
	> -Favourite_recipes n to n con Recipe   
	> -Favourite_chefs 1 to n con Recipe chef_id  
	  
  
- RECIPE: la ricetta dello CHEF  
	Properties:  
	> -Id  
	> -Name  
	> -Descrizione  
	> -img_path  
	> -duration  
	> -Recipe_points  
	> -difficulty  
	> -Chef_id  
	> -Ingredients  
	> -Meal Type  
	> -Cuisine  
  
- DIFFICULTY: difficoltà ricetta  
	Properties:  
	> -Id  
	> -Name  
  
- STEP: il passaggio della ricetta  
	Properties:  
	> -Id    
	> -Recipe_id  
	> -Position  
	> -Description  
	> -Action_type  
  
- INGREDIENTS: gli ingredienti per ogni Recipe  
	Properties:  
	> -Id  
	> -Nome  
	> -Category  
  

