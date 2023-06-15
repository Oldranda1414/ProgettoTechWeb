# Life&Games

## Sviluppato da/Developed by
- [Vittorio Damiano Brasini](https://github.com/vdamianob)
- [Leonardo Randacio](https://github.com/Oldranda1414)
- [Filippo Velli](https://github.com/FilVel)
---

## Lingua/Langauge
1. [Italian](#ita)
2. [English](#eng)
---
## ITA
## Descrizione dell'applicazione
Life&Games, l'applicazione web da noi realizzata, si pone l'obiettivo di permettere agli utenti di condividere le proprie esperienze e di esprimere le proprie opinioni in ambito videoludico tramite sia post, composti da una descrizione, un tag ed una immagine, sia commenti, che ogni utente può fare a qualsiasi post.

## Descrizione delle caratteristiche

1. [Registrazione e Login](#registrazione-e-login)
2. [Home](#home)
3. [Post](#post)
    - [Contenuto](#contenuto)
    - [Mi piace](#mi-piace)
    - [Caricamento dei post sulle pagine](#caricamento-dei-post-sulle-pagine)
    - [Creazione di nuovi post](#creazione-di-nuovi-post)
    - [Link dei post](#link-dei-post)
4. [Commenti](#commenti)
5. [Pagina profilo](#pagina-profilo)
6. [Notifiche](#notifiche)
7. [Aspetti di sicurezza](#aspetti-di-sicurezza)
8. [Altre informazioni](#altre-informazioni)

### Registrazione e Login
Per poter accedere ai servizi e ai contenuti offerti a Life&Games si deve fare log-in. Quindi, è necessario possedere un proprio account.

In fase di registrazione e di eventuale cambio password sarà necessario inserire una password con dei criteri, già indicati nei casi sopraindicati, ovvero deve essere almeno di 6 caratteri e deve contenere almeno 1 lettera minuscola, 1 maiuscola, 1 numero ed almeno 1 carattere speciale tra !, ?, %, &, *, @ e $.

### Home
La pagina iniziale di Life&Games, dopo la fase di logging, presenta una serie di post appartenenti agli utenti che si segue; se non si seguono utenti, allora verranno caricati i post più recenti.

### Post
### Contenuto

In tutte le pagine del sito verranno mostrati i post, ovvero il metodo principale di comunicazione offerto agli utenti che utilizzeranno questo social network, che permette loro di condividere loro esperienze o esprimere propri pareri o anche chiedere quelli di altri utenti, sempre nell'ambito dei videogiochi.

### Mi piace

Da ogni post è possibile aggiungere o togliere il proprio 'mi piace', indicatore del gradimento del post da parte di un utente. Un utente può mettersi 'mi piace' sui propri post.

### Caricamento dei post sulle pagine

In base alla pagina verranno mostrati dei post differenti (per esempio i risultati di una ricerca per contenuto, tag o utente, i post realizzati da un utente...) ed essi verranno generati dinamicamente attraverso richieste Axios. Infatti, tramite uno script ed un API apposito, appena l'utente fa lo scrolling della pagina vengono effettuate ulteriori richieste al database che caricherà ulteriori post.

### Creazione di nuovi post

Ogni utente può, fatto il log-in, da qualsiasi pagina del sito creare un nuovo post, composto da una descrizione, un tag ed un'immagine caricata dal proprio dispositivo.

Il tag può essere sia il titolo del gioco a cui il post fa riferimento, sia il nome di un franchise, sia una tipologia di evento presente in più giochi, come può essere 'boss battle' o di altro tipo, si lascia agli utenti la creatività di indicare il tag che loro ritengono più appropriato.

N.B. Nell'inserimento dei tag bisogna fare attenzione a non inserire i caratteri _ e &, altrimenti risulterà essere non valido e si dovrà ritentare la procedura di aggiunta del post.

### Link dei post

Ogni post, oltre a includere il tasto per l'aggiunta o rimozione del 'mi piace', presenta un link al profilo dell'autore, uno al tag specifico che genera una ricerca con i post che hanno lo stesso tag del post in questione e uno alla pagina vera e propria del post, dove vengono, inoltre, mostrati i commenti riferiti ad esso.

### Commenti
I commenti sono la seconda modalità di comunicazione tra gli utenti fornita da Life&Games. Si riferiscono ad un post e si possono visualizzare dalla pagina specifica di quel post, accessibile dalle preview presenti nelle altre pagine.

È possibile aggiungerne di nuovi sempre dalla pagina del post specifico sotto a tutti gli altri già fatti in precedenza. Questo rende possibile l'inizio di una discussione tra vari utenti.

Inoltre, è da segnalare che si possono iniziare delle conversazioni nella sezione commenti di un post, dato che un utente piò inserire più commenti riferiti ad uno stesso post.

### Pagina profilo
Ogni utente possiede una propria pagina profilo, dove sono mostrati i post e commenti pubblicati, i mi piace che ha messo ai post, la lista degli utenti che lo seguono/follower e di quelli che segue/followed.

Da questa pagina si può scegliere se seguire quell'utente o meno.

Ogni pagina profilo mostra anche l'indirizzo e-mail utilizzato da quel utente in fase di registrazione.

Se si accede alla pagina del proprio profilo, al posto dell'opzione di seguire l'utente si ha accesso alla possibilità di modificare l'immagine profilo e la propria password.

### Notifiche
Quando un utente mette 'mi piace' ad un proprio post o lo commenta o quando un utente inizia a seguirci, si riceveranno delle notifiche. Queste possono essere visualizzate cliccando sulla capanella. Da lì possono anche essere eliminate del tutto.

### Aspetti di sicurezza
In ogni operazione che si occupa della gestione delle credenziali di un utente, si utilizza il protocollo SHA-512.

In questo modo all'interno del database e nella rete in generale transita solo la versione crittografata delle credenziali e non la password in chiaro.

### Altre informazioni
Il sito è stato costruito mediante l'uso di HTML, CSS e Bootstrap, PHP, MySQL, Javascript e Axios.

---
## ENG

## Description of the web application
Life&Games, the web application we developed, aims to allow users to share their experiences and express their opinions on videogames through the use of both posts, consisting of a description, a tag and an image, and comments, that any user can make to any post.

## Description of its characteristics

1. [Registration and Login](#registration-and-login)
2. [Home](#homepage)
3. [Post](#posts)
    - [Content](#content)
    - [Likes](#likes)
    - [Dynamic loading of posts on pages](#dynamic-loading-of-posts-on-pages)
    - [New post creation](#new-post-creation)
    - [Posts' links](#posts-links)
4. [Comments](#comments)
5. [Profile page](#profile-page)
6. [Notifications](#notifications)
7. [Aspetti di sicurezza](#aspetti-di-sicurezza)
8. [Further Information](#further-information)

### Registration and Login
In order to access the services and content offered by Life&Games, any person must log in. Therefore, it is required for any user to have an account of their own. 

When registering and changing your password, you will need to enter a password with certain criteria, already indicated in the cases above, that is, it must be at least 6 characters and must contain at least 1 lowercase letter, 1 uppercase letter, 1 number and at least 1 special character between !, ?, %, &, *, @ and $.

### Homepage
The Life&Games homepage, after the logging phase, presents a series of posts belonging to users you follow; if you do not follow any user, then the most recent posts will be shown.

### Posts
### Content

Almost all pages of the site will show posts, which is the main method of communication offered to users who will use this social network, allowing them to share their experiences or express their own opinions or even ask for those of other users, again in the area of viedogames.

### Likes

From each post you can add or remove your 'like' (here shown with its italian equivalent 'mi piace'), an indicator of a user's liking of the post. A user can put 'like' on their own posts.

### Dynamic loading of posts on pages

Depending on the page different posts will be shown (e.g. search results by description, tag or user, posts made by a certain user...) and they will be dynamically generated through a series of Axios requests. In fact, through a script and a special API, as soon as the user scrolls the page to its end, additional requests are made to the database that will load additional posts.

### New post creation

Each user can, having logged in, from any page of the site create a new post, consisting of a description, a tag and an image uploaded from their own device.

The tag can be either the title of the game to which the post refers, or the name of a franchise, or a type of event present in more than one game, e.g. 'boss battle', or others, it is left to the users' creativity and imagination to indicate the tag they deem most appropriate.

NB When entering tags care must be taken not to enter the characters _ and &, otherwise it will turn out to be not valid and you will have to retry the process of adding the post.

### Posts' links

Each post, in addition to including the button for adding/removing the 'mi piace', has a link to the author's profile, one to the specific tag, that generates a search with posts that have the same tag as the post in question, and one to the actual page of the post, where comments referring to it are, in addition, shown.

### Comments
Comments are the second mode of communication between users provided by Life&Games. They relate to a post and can be viewed from the specific page of that post, accessible from the previews on the other pages.

New ones can always be added from the page of the specific post below any others made previously. This makes it possible to start a discussion between several users.

Also, it should be noted that conversations can be started in the comments section of a post, since a user can enter multiple comments referring to the same post.

### Profile page
Each user has his or her own profile page, where his or her published posts and comments are shown, the 'mi piace' he or she has put on posts, and the list of users who follow him or her/followers and those he or she follows/followed.

From this page one can choose whether to follow that user or not.

Each profile page also shows the e-mail address used by that user during the registration phase.

If you go to your profile page, instead of the option to follow yourself, you have access to the ability to change the profile picture and your password.

### Notifications
When a user likes or comments on one of your posts or when a user starts following you, you will receive a notification. Notifications can be viewed by clicking on the bell on the top right. From there they can also be removed altogether.

### Security Aspects
In every operation that deals a user's credentials, the SHA-512 protocol is used.

In this way, only the encrypted version of the credentials and not the plaintext version transits within the database and the net.

### Further Information
This website has been made through the use of HTML, CSS and Bootstrap, PHP, MySql, Javascript and Axios.