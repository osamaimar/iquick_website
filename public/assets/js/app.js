const chat_btn = document.getElementById("chat-btn"),
  chat = document.getElementById("chat");
/*
! **********  chat  ********** !
*/
//  Add And Remove Classes From Chat
document.addEventListener("click", (e) => {
  if (e.target.closest("#chat-btn")) {
    chat_btn.classList.add("open");
    chat.classList.add("show");
  } else if (!e.target.closest("#chat-btn") && !e.target.closest("#chat")) {
    chat_btn.classList.remove("open");
    chat.classList.remove("show");
  }
});
/*
? **********  chat  ********** ? 
*/
