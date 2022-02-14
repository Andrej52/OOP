var slideIndex=1
function slide(n) {
  showSlides(slideIndex += n);
}
function showSlides(n) {
  var slides = document.getElementsByClassName("image");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "flex";
}

/*
                    <button id="prev" onclick="slide(-1)">prev</button>
                    <button id="next" onclick="slide(1)">next</button>

*/