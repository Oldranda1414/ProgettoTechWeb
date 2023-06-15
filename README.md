# ProgettoTechWeb

## Obiettivo
- Scrivere un’applicazione web accessibile e
responsive che metta a disposizione le
funzionalità più comuni di un social network
su una qualsiasi tematica a scelta (es:
fotografia, tecnologia, lavoro).

- Ci sarà un solo tipo di utente, che si iscrive al
social per connettersi con altre persone. 

## Design
La progettazione deve essere:
1. Mobile First
2. User Centered
3. Accessibile

---

# Life&Games

## Sviluppato da
- Vittorio Damiano Brasini
- Leonardo Randacio
- Filippo Velli
---

## Descrizione dell'applicazione
Life&Games, l'applicazione web da noi realizzata, si pone l'obiettivo di permettere agli utenti di condividere le proprie esperienze e di esprimere le proprie opinioni in ambito videoludico tramite sia post, composti da una descrizione, un tag ed una immagine, sia commenti, che ogni utente può fare a qualsiasi post.

## Descrizione delle caratteristiche

### Registrazione e Login
Per poter accedere ai servizi e ai contenuti offerti a Life&Games si deve fare log-in. Quindi, è necessario possedere un proprio account.

In fase di registrazione e di eventuale cambio password sarà necessario inserire una password con dei criteri, già indicati nei casi sopraindicati, ovvero deve essere almeno di 6 caratteri e deve contenere almeno 1 lettera minuscola, 1 maiuscola, 1 numero ed almeno 1 carattere speciale tra !, ?, %, &, *, @ e $.

### Home
La pagina iniziale di Life&Games, dopo la fase di logging, presenta una serie di post appartenenti agli utenti che si segue; se non si seguono utenti, allora verranno caricati i post più recenti.

### Post
### 1. Contenuto

In tutte le pagine del sito verranno mostrati i post, ovvero il metodo principale di comunicazione offerto agli utenti che utilizzaranno questo social network, che permette loro di condividere loro esperienze o esprimere propri pareri o anche chiedere quelli di altri utenti, sempre nell'ambito dei vidogiochi.

### 2. Mi piace

Da ogni post è possibile aggiungere o togliere il proprio 'mi piace', indicatore del gradimento del post da parte di un utente. Un utente può mettersi 'mi piace' solo.

### 3. Caricamento dei post sulle pagine

In base alla pagina verranno mostrati dei post differenti (per esempio i risultati di una ricerca per contenuto, tag o utente, i post realizzati da un utente...) ed essi verranno generati dinamicamente attraverso richieste Axios. Infatti, tramite uno script ed un API apposito, appena l'utente fa lo scrolling della pagina vengono effettuate ulteriori richieste al database che caricherà ulteriori post.

### 4. Creazione di nuovi post

Ogni utente può, fatto il log-in, da qualsiasi pagina del sito creare un nuovo post, composto da una descrizione, un tag ed un'immagine caricata dal proprio dispositivo.

Il tag può essere sia il titolo del gioco a cui il post fa riferimento, sia il nome di un franchise, sia una tipologia di evento presente in più giochi, come può essere 'boss battle' o di altro tipo, si lascia agli utenti la creatività di indicare il tag che loro ritengono più appropriato.

N.B. Nell'inserimento dei tag bisogna fare attenzione a non inserire i caratteri _ e &, altrimenti risulterà essere non valido e si dovrà ritentare la procedura di aggiunta del post.

### 5. Link dei post

Ogni post, oltre a includere il tasto per l'aggiunta o rimozione del 'mi piace', presenta un link al profilo dell'autore, uno al tag specifico che genera una ricerca con i post che hanno lo stesso tag del post in questione e uno alla pagina vera e propria del post, dove vengono, inoltre, mostrati i commenti riferiti ad esso.

### Commenti
I commenti sono la seconda modalità di comunicazione tra gli utenti fornita da Life&Games. Si riferiscono ad un post e si possono visualizzare dalla pagina specifica di quel post, accessibile dalle preview presenti nelle altre pagine.

È possibile aggiungerne di nuovi sempre dalla pagina del post specifico sotto a tutti gli altri già fatti in precedenza. Questo rende possibile l'inizio di una discussione tra vari utenti.

Inoltre, è da segnalare che si possono iniziare delle conversazioni nella sezione commenti di un post, dato che un utente piò inserire più commenti riferiti ad uno stesso post.

### Pagina profilo
Ogni profilo possiede una propria pagina, dove sono mostrati i post e commenti pubblicati, i mi piace che ha messo ai post, la lista degli utenti che lo seguono/follower e di quelli che segue/followed.

Da questa pagina si può scegliere se seguire quell'utente o meno.

Ogni pagina profilo mostra anche l'indirizzo e-mail utilizzato da quel utente in fase di registrazione.

Se si accede alla pagina del proprio profilo, al posto dell'opzione di seguire l'utente si ha accesso alla possibilità di modificare l'immagine profilo e la propria password.

### Notifiche
Quando un utente mette 'mi piace' ad un proprio post o lo commenta o quando un utente inizia a seguirci, si riceveranno delle notifiche. Queste possono essere visualizzate cliccando sulla capanella. Da lì possono anche essere eliminate del tutto.

### Aspetti di sicurezza
In ogni operazione che si occupa della gestione delle credenziali di un utente, si utilizza il protocollo SHA-512.

In questo modo all'interno del database vi entra solo la versione crittografata delle credenziali e non la password in chiaro.

### Altre informazioni
Il sito è stato costruito mediante l'uso di HTML, CSS e Bootstrap, PHP, MySQL, Javascript e Axios.
