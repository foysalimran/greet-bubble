(function($){

"use strict";
 let greetWrapper = document.getElementById("greet_wrapper");
      let greetVideo = document.getElementById("greet_video");
      let greetToggler = document.querySelector(".greet_toggler");
      let greetFullPlay = document.getElementById("greet_full-play");
      let greetFullReplay = document.getElementById("greet_full-replay");
      let greetFullVolume = document.getElementById("greet_full-volume");
      let greetFullMute = document.getElementById("greet_full-mute");
      let greetFullExpand = document.getElementById("greet_full-expand");
      let greetFullBtn = document.getElementById("greet_full-btn");
      let greetText = document.getElementById("greet_text");
      let greetClose = document.querySelector(".greet_close")
      let greetFullClose = document.querySelector(".greet_full-close")
if(greetWrapper){
      greetVideo.autoplay = true;
      greetVideo.muted = true;
      greetVideo.loop = true;
      greetFullExpand.addEventListener("click", () => {
        greetVideo.requestFullscreen()
      })
      // REPLAY GREET
      greetFullReplay.addEventListener("click", () => {
        greetVideo.currentTime = 0;
      })
      // VOLUME UP
      greetFullVolume.addEventListener("click", () => {
        greetFullMute.style.display = "flex";
        greetFullVolume.style.display = "none";
        greetVideo.muted = true;
      });
      // VOLUME MUTE
      greetFullMute.addEventListener("click", () => {
        greetFullVolume.style.display = "flex";
        greetFullMute.style.display = "none";
        greetVideo.muted = false;
      });
      // VIDEO PLAY
      greetFullPlay.addEventListener("click", () => {
        greetVideo.play();
        greetFullPlay.style.display = "none";
        greetWrapper.classList.toggle("play-video");
      });
      // CLOSE TOTAL GREET
      greetClose.addEventListener("click", () => {
        greetWrapper.style.display = "none";
      });

      // CLOSE FULL GREET

        greetFullClose.addEventListener("click", () => {
        greetWrapper.classList.remove("greet_wrapper-full");
        greetWrapper.classList.remove("play-video");
        greetVideo.muted = true;
        greetVideo.play();
        greetFullBtn.style.display = "none";
      });
      // OPEN FULL GREET
      const videoModal = () => {
        if(!greetWrapper.classList.contains('greet_wrapper-full')){
          greetVideo.currentTime = 0;
        }
        greetWrapper.classList.add("greet_wrapper-full");
        greetWrapper.classList.toggle("play-video");
        greetVideo.muted = false;
       
        greetFullMute.style.display = "none";
        greetFullVolume.style.display = "flex";
        if (greetWrapper.classList.contains("play-video")) {
          greetVideo.play();
          greetFullPlay.style.display = "none";
        } else {
          greetVideo.pause();
          greetFullPlay.style.display = "flex";
        }
        greetFullBtn.style.display = "block"
      };
      
      greetVideo.addEventListener("click", () => {
        videoModal()
      });
      greetText.addEventListener("click", () => {
        videoModal()
      })

      // ON SCROLL SIZE CHANGE
      window.addEventListener("scroll", function (event) {
        let scroll = scrollY;
        if (scroll > 1) {
          greetWrapper.classList.add("greet_wrapper-resize");
        } else {
          greetWrapper.classList.remove("greet_wrapper-resize");
        }
      });

    }
})(jQuery)