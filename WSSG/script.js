// this is for the drop list menu on the user account page 
var expandableList = document.getElementsByClassName("updatebtn");
var i;

for (i = 0; i < expandableList.length; i++) 
{
    expandableList[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") 
    {
      content.style.display = "none";
    } else 
    {
      content.style.display = "block";
    }
  });
}
// end of this

//contact form message

 function contactAction()
 {
  alert("");
 }
//end of contact form 


