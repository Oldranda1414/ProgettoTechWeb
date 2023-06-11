let params = new URLSearchParams(window.location.search);
let search = params.get('search');
let type = params.get('flexRadioDefault');
let user = params.get('Username');

let numberPostsActive=0;
let offsetSta=6;
let totalPosts=100;

function createPost(posts){
	let result = `
	<div class="container my-3">
		<div class="row">
	`;
    for(let i=0; i < posts.length; i++){
		let user_id=`${posts[i]['session_ID']}`;
		let like;
		let likeAction;
		if (`${posts[i]["Liked"]}`==true){
			like="Non mi piace più";
			likeAction = `remove&postId=${posts[i]["Post_id"]}&userId=${user_id}`;
		} else {
			like="Mi piace";
			likeAction = `add&postId=${posts[i]["Post_id"]}&userId=${user_id}`;
		}

		let id = `${posts[i]["Post_id"]}`;
		let Date_time=new Date(`${posts[i]["DT"]}`);
        let formattedDate = `${Date_time.getDate()}-${Date_time.getMonth() + 1}-${Date_time.getFullYear()} alle ${Date_time.getHours()}:${Date_time.getMinutes()}`;
        let post = `
            <div class="col-12 col-md-6 col-lg-4">
				<div class="card m-2 bg-4">
					<a href="profile.php?Username=${posts[i]["Username"]}">
						<img src="${posts[i]["Profile_img"]}" class="post-img-profile mr-3" alt="profile icon"
							height="50">
						<div class="nickname-post">${posts[i]["Username"]}</div>
					</a>
					<img src="${posts[i]["Img"]}" class="card-img-top" alt="Post Image">
					<div class="card-body text-center">
						<a href="explore.php?search=${posts[i]["Game_name"]}&flexRadioDefault=ptag">
						<div class="card-title post-title">${posts[i]["Game_name"]}</div>
						</a>
						<p class="card-text">${posts[i]["Words"]}</p>
						<form action="" method="POST">
    						<button type="submit" name="like_button" value="type=${likeAction}" class="btn like-button">
								${like}
							</button>
						</form>
						<button type="button" class="btn post-button" onclick="location.href='post.php?id=${id}'">
							Apri Post
						</button>
					</div>
					<div class="card-footer text-muted small font-italic">
                        ${formattedDate}
					</div>
				</div>
			</div>
        `;
        result += post;
    }
	numberPostsActive += posts.length;
	totalPosts=parseInt(`${posts[0]["Number_of_posts"]}`);
	result += `
		</div>
	</div>
	`;
    return result;
}

function fetchPosts(offs){
	axios.get('api-posts.php', {
		params: {
	 	offset : (offs),
		numberPosts : (offsetSta),
		search: (search),
		type: (type),
		user: (user),
		}
  	}).then(response => {
		if(response.data.length>0){
			console.log(response);
			let posts = createPost(response.data);
			const main = document.getElementById('posts');
			main.innerHTML += posts; 
		}
	}).catch(error => {
		console.log(error);
	})
};

window.addEventListener('load', () => {
	fetchPosts(numberPostsActive);
})

window.addEventListener('scroll', () => {
	if (window.scrollY + window.innerHeight >= document.documentElement.scrollHeight) {
		let offset=numberPostsActive;
		if  (totalPosts>=numberPostsActive){
			
		} else {
			if (numberPostsActive<=totalPosts-offsetSta)
				numberPostsActive+=offsetSta;
			else if (numberPostsActive>totalPosts-offsetSta){
				numberPostsActive=totalPosts;
			}
		}
		fetchPosts(offset);
	}
});