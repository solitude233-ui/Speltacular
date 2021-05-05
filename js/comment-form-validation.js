const COMMENT_FORM = "comment-form";
const USER_COMMENT_FORM_NAME = "commenter-name";
const USER_COMMENT_FORM_TEXT = "comment-text";
const SUBMIT_BUTTON = "submit-button";

// Validate anonymous names
function validateName() {
    let userNameElement = document.getElementById(USER_COMMENT_FORM_NAME);
    let userName = userNameElement.value;
    let name = userName.trim();
	if (name.length != 0) {
		return true;
	}
	return false;
}		

// Validate empty comments
function validateComment() {
	let userCommentElement = document.getElementById(USER_COMMENT_FORM_TEXT);
	let submit = document.getElementById(SUBMIT_BUTTON);
    let userComment = userCommentElement.value;
	let comment = userComment.trim();
	if (comment.length == 0) {
		document.getElementById(SUBMIT_BUTTON).disabled = true;
        submit.style.opacity= "0.5";
        submit.style.textDecoration = "line-through";
		return false;
	}
	else {
		document.getElementById(SUBMIT_BUTTON).disabled = false;
        submit.style.opacity= "1";
        submit.style.textDecoration = "none";
		return true;
	}
	return true;
}


window.addEventListener("load", function() {
	validateComment();
	let formElement = document.getElementById(COMMENT_FORM);
	let userNameElement = document.getElementById(USER_COMMENT_FORM_NAME);
	let userCommentElement = document.getElementById(USER_COMMENT_FORM_TEXT);
	let submit = document.getElementById("submit-button");
	
	if (userCommentElement) {
		userCommentElement.addEventListener("keyup", validateComment);
	}	
	
	formElement.addEventListener("submit", function(event) {
		// If name is empty then confirm with user
		if (! validateName()) {
			let post = true;
			if (!confirm("Are you sure you want to post your comment anonymously?")) {
				post = false;
			}
			if (!post) {
				event.preventDefault();	
			}	
		}
	});
	
	if (formElement) {		
        formElement.addEventListener("submit", function(event) {
			if (! validateComment()) {
				event.preventDefault();	
			}
		});
    } 
});