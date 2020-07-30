let migvimeoplayer = function () {
  

    let dseUrl = window.dseData.url;



    // CREATE SCRIPT
    const docHeader = document.getElementsByTagName("head")[0];
    let vimeoPy = document.createElement('script');

    vimeoPy.setAttribute("src", 'https://player.vimeo.com/api/player.js');
    vimeoPy.setAttribute("type", 'text/javascript');

    docHeader.appendChild(vimeoPy);

    //AFTER THE SCRIPT WAS LOADED, RUN THE VIMEO FUNCTION
    window.addEventListener("load", function (e) {



        // GET ALL DOCUMENT SELECTORS AND CREATE A VIDEO PLAYER FOR EACHONE
        let playerContainers = document.querySelectorAll('.divi_se_vimeobg');

        window.mobileAndTabletCheck = function() {
            let check = false;
            (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
            return check;
        };
        playerContainers.forEach(function (thisContainer) {
            var allData = JSON.parse(thisContainer.getAttribute("data-vimeobg"));
            var fallback = false;
            var fallsource = allData.fallsource;
            var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

            if(fallsource == 'some' && iOS == true){
                fallback = true;
            }
            if(fallsource == 'all' && document.querySelector('body').classList.contains('et_mobile_device')){
                fallback = true;
            }

       
            
            if(!fallback){
                // GET  GENERAL SIZES TO ADJUST VALUES LATER DEPENDING ON USER SELECTION
                let playerContainerWidth = thisContainer.offsetWidth;
                let playerContainerHeight = thisContainer.offsetHeight;
                let screenHeight = window.screen.availHeight;
                

                // CREATE AN OUTER AN INNER WRAPPER TO ADJUST THE SIZE TO CONTAINER AND ALSO OVERSIZE THE INNER ONE
                let videoOuterWrapper = document.createElement("div");
                videoOuterWrapper.setAttribute("class", "mig-vimeo-outer-wrapper");


                let vimeoWrapper = document.createElement("div");
                vimeoWrapper.setAttribute("class", "mig-vimeo-wrapper");

                let vimeoOverlay = document.createElement("div");
                vimeoOverlay.setAttribute("class", "mig-vimeo-overlay");


                thisContainer.prepend(videoOuterWrapper);
            
                videoOuterWrapper.prepend(vimeoWrapper);
                videoOuterWrapper.prepend(vimeoOverlay);


                let defaultoptions = {
                    id: "15069551",
                    width: playerContainerWidth,
                    autopause: false,
                    autoplay: true,
                    byline: false,
                    controls: false,
                    height: null,
                    loop: true,
                    maxheight: null,
                    maxwidth: null,
                    playsinline: true,
                    portrait: false,
                    muted: true,
                    title: false,
                    transparent: true,
                    speed: false,
                };

                let data, customoptions = {};
                if (thisContainer.getAttribute("data-vimeobg") !== null) {
                    data = JSON.parse(thisContainer.getAttribute("data-vimeobg"));
                    customoptions = JSON.parse(thisContainer.getAttribute("data-vimeobg"));
                    delete customoptions.widthT;
                    delete customoptions.widthP;
                    delete customoptions.preloader;



                    // create variable to notify vimeo events when is neccesary apply preloader

                    if (data.preloader !== "none" && data.preloader !== undefined) {


                        customoptions.autoplay = false;
                        let vimeoLoader = document.createElement("div");
                        vimeoLoader.setAttribute("class", "mig-vimeo-loader");
                        if (data.preloader !== "black") {
                            vimeoLoader.style.backgroundImage = `url("${dseUrl}/dse-functions/images/${data.preloader}.gif")`;
                        }

                        videoOuterWrapper.appendChild(vimeoLoader);
                    }


                    // FIRST WE ADJUST VALUES DEPENDING ON SCREEN WIDTH
                    if (playerContainerWidth < 980) {

                        // adjust preloader position on mobile devices to prevent wrong display on large sections
                        if (thisContainer.querySelector(".mig-vimeo-loader")) {
                            thisContainer.querySelector(".mig-vimeo-loader").style.backgroundPositionY = `${screenHeight / 2}px`;
                        }

                        (data.widthP) ? customoptions.width = data.widthP : customoptions.width = data.width;
                    }


                    // ADJUST VIDEO HEIGHT AND WIDTH
                    if (customoptions.width == "height" || customoptions.width == "regularheight") {
                        let overSizeWidth = playerContainerHeight * 2.65;
                        if(overSizeWidth <= playerContainerWidth){
                            overSizeWidth = playerContainerWidth;
                        }
                        customoptions.width = overSizeWidth;
                        vimeoWrapper.style.width = overSizeWidth + "px";

                        vimeoWrapper.style.marginLeft = "-" + ((overSizeWidth - playerContainerWidth) / 2 + "px");

                    }
                    else if (customoptions.width == "screen") {
                        let overSizeScreen = screenHeight * 2.65;
                        customoptions.width = overSizeScreen;
                        vimeoWrapper.style.width = overSizeScreen + "px";

                        vimeoWrapper.style.marginLeft = "-" + ((overSizeScreen - playerContainerWidth) / 2 + "px");

                    }
                    else if (customoptions.width == "parallax") {
                        let overSizeScreen = screenHeight * 2.65;
                        customoptions.width = overSizeScreen;
                        vimeoWrapper.style.width = overSizeScreen + "px";

                        vimeoWrapper.style.marginLeft = "-" + ((overSizeScreen - playerContainerWidth) / 2 + "px");


                        window.addEventListener("scroll", function (e) {

                            //console.log(window.scrollY);
                            //console.log(thisContainer.offsetTop);

                            if (window.scrollY >= thisContainer.offsetTop &&
                                window.scrollY <= thisContainer.offsetTop + thisContainer.offsetHeight
                                
                            ) {
                                thisContainer.querySelector(".mig-vimeo-wrapper").style.position = "fixed";
                            }
                            else {
                                thisContainer.querySelector(".mig-vimeo-wrapper").style.position = "relative";
                            }
                        })

                    }
                    else {
                        delete customoptions.width;
                    }


                }


                let finaloptions = { ...defaultoptions, ...customoptions };


                let embedHere = thisContainer.querySelector(".mig-vimeo-wrapper");

                let videoPlayer = new Vimeo.Player(embedHere, finaloptions);


                videoPlayer.on("loaded", function () {

                    if(data.preloader != "none"){
                        videoPlayer.play()
                        .then(function(event){})
                        .catch(function(error){
                            console.log("error vimeo");
                            videoPlayer.setVolume(0).then(function(){
                                videoPlayer.play();
                            });
                            
                        });
                    } 

                })

                videoPlayer.on("play", function () {

                    if (data.preloader != "none") {
                        if (thisContainer.querySelector(".mig-vimeo-loader")) {
                            setTimeout(function () {
                                thisContainer.querySelector(".mig-vimeo-loader").style.backgroundColor = "transparent";
                                thisContainer.querySelector(".mig-vimeo-loader").style.backgroundImage = "none";
                            }, data.delay);
                        }
                    }

                })

            } // end of if fallback

        }) //end of foreach


    })


};
migvimeoplayer();







let migyoutubeplayer = function () {


    window.migYtplayersLoaded = {};



    const mainWindow = this;

    let dseUrl = window.dseData.url;
    


    let migYoutubePlayers = [];
    window.migYoutubePlayers = migYoutubePlayers;

    //AFTER THE SCRIPT WAS LOADED, RUN THE YOUTUBE FUNCTION
    window.addEventListener("load", function (e) {
        // CREATE SCRIPT
    const docHeader = document.getElementsByTagName("head")[0];
    let youtubePy = document.createElement('script');

    youtubePy.setAttribute("src", 'https://www.youtube.com/iframe_api');
    youtubePy.setAttribute("type", 'text/javascript');

    docHeader.appendChild(youtubePy);


        // GET ALL DOCUMENT SELECTORS AND CREATE A VIDEO PLAYER FOR EACHONE
        let playerContainers = document.querySelectorAll('.divi_se_youtubebgnew');


        playerContainers.forEach(function (thisContainer, index) {
            var allData = JSON.parse(thisContainer.getAttribute("data-youtubebg"));
            var fallback = false;
            var fallsource = allData.fallsource;
            var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

            if(fallsource == 'some' && iOS == true){
                fallback = true;
            }
            if(fallsource == 'all' && document.querySelector('body').classList.contains('et_mobile_device')){
                fallback = true;
            }

          
            if(fallback != 'caca'){
                // GET  GENERAL SIZES TO ADJUST VALUES LATER DEPENDING ON USER SELECTION
                let playerContainerWidth = thisContainer.offsetWidth;
                let playerContainerHeight = thisContainer.offsetHeight;
                let screenHeight = window.screen.availHeight;
                let background = getComputedStyle( thisContainer ,null).getPropertyValue('background');  
    

                // CREATE AN OUTER AN INNER WRAPPER TO ADJUST THE SIZE TO CONTAINER AND ALSO OVERSIZE THE INNER ONE
                let videoOuterWrapper = document.createElement("div");
                videoOuterWrapper.setAttribute("class", "mig-youtube-outer-wrapper");


                let youtubeWrapper = document.createElement("div");
                youtubeWrapper.setAttribute("class", "mig-youtube-wrapper");

                let youtubeWrapperIframe = document.createElement("div");
                youtubeWrapperIframe.setAttribute("class", "mig-youtube-wrapper-iframe");

                let youtubeOverlay = document.createElement("div");
                youtubeOverlay.setAttribute("class", "mig-youtube-overlay");

                let youtubeCustomOverlay = document.createElement("div");
                youtubeCustomOverlay.setAttribute("class", "mig-youtube-customoverlay");
                

                thisContainer.prepend(videoOuterWrapper);
                videoOuterWrapper.prepend(youtubeWrapper);
                
                videoOuterWrapper.prepend(youtubeOverlay);
                youtubeWrapper.prepend(youtubeWrapperIframe);
                







                let defaultoptions = {
                        height: "100%",
                        width: playerContainerWidth,
                        videoId: 'M7lc1UVf-VE',
                        playerVars: {
                            autoplay: 1,
                            controls: 0,
                            disablekb: 1,
                            enablejsapi: 1,
                            fs: 0,
                            iv_load_policy: 3,
                            loop: 0,
                            modestbranding: 1,
                            origin: window.location.origin,
                            rel: 0,
                            showinfo: 0,
                            start: null,
                            end: null
                        },
                        
                        events: {
                            'onReady': migYTReady,
                            'onStateChange' : migYTPlay,
                            'onError' : migYTError
                        }
                    };

                let customoptions = {};
                if (thisContainer.getAttribute("data-youtubebg") !== null) {
                    customoptions = JSON.parse(thisContainer.getAttribute("data-youtubebg"));
                

                    // create variable to notify youtube events when is neccesary apply preloader
                    if(customoptions.bgoverlay == "yes"){
                        videoOuterWrapper.prepend(youtubeCustomOverlay);
                        youtubeCustomOverlay.style.background = background;
                    }


                    if (customoptions.preloader !== "none" && customoptions.preloader !== undefined) {


                        
                        let youtubeLoader = document.createElement("div");
                        youtubeLoader.setAttribute("class", "mig-youtube-loader");
                        if (customoptions.preloader !== "black") {
                            youtubeLoader.style.backgroundImage = `url("${dseUrl}/dse-functions/images/${customoptions.preloader}.gif")`;
                        }

                        videoOuterWrapper.appendChild(youtubeLoader);
                    }


                    // FIRST WE ADJUST VALUES DEPENDING ON SCREEN WIDTH
                    if (playerContainerWidth < 980) {

                        // adjust preloader position on mobile devices to prevent wrong display on large sections
                        if (thisContainer.querySelector(".mig-youtube-loader")) {
                            thisContainer.querySelector(".mig-youtube-loader").style.backgroundPositionY = `${screenHeight / 2}px`;
                        }

                        (customoptions.widthP) ? customoptions.width = customoptions.widthP : customoptions.width = customoptions.width;
                    }


                    // ADJUST VIDEO HEIGHT AND WIDTH
                    if (customoptions.width == "width") {
                        let adjustedHeight = playerContainerWidth * 0.562;
                    
                        customoptions.height = adjustedHeight
                    }

                    if (customoptions.width == "height") {
                        let overSizeWidth = playerContainerHeight * 2.65;
                        if(overSizeWidth <= playerContainerWidth){
                            overSizeWidth = playerContainerWidth;
                        }
                        customoptions.width = overSizeWidth;
                        youtubeWrapper.style.width = overSizeWidth + "px";

                        youtubeWrapper.style.marginLeft = "-" + ((overSizeWidth - playerContainerWidth) / 2 + "px");
                        customoptions.height = playerContainerHeight * 1;
                    }
                    else if (customoptions.width == "regularheight") {
                        customoptions.width = "100%";
                        customoptions.height = playerContainerHeight;
                    }
                    else if (customoptions.width == "screen") {
                        let overSizeScreen = screenHeight * 2.65;
                        customoptions.width = overSizeScreen;
                        youtubeWrapper.style.width = overSizeScreen + "px";

                        youtubeWrapper.style.marginLeft = "-" + ((overSizeScreen - playerContainerWidth) / 2 + "px");
                        customoptions.height = screenHeight * 1;
                    }
                    else if (customoptions.width == "parallax") {
                        let overSizeScreen = screenHeight * 2.65;
                        customoptions.width = overSizeScreen;
                        youtubeWrapper.style.width = overSizeScreen + "px";

                        youtubeWrapper.style.marginLeft = "-" + ((overSizeScreen - playerContainerWidth) / 2 + "px");
                        customoptions.height = screenHeight * 1.05;

                        window.addEventListener("scroll", function (e) {

                            //console.log(window.scrollY);
                            //console.log(thisContainer.offsetTop);

                            if (window.scrollY >= thisContainer.offsetTop &&
                                window.scrollY <= thisContainer.offsetTop + thisContainer.offsetHeight
                                
                            ) {
                                thisContainer.querySelector(".mig-youtube-wrapper").style.position = "fixed";
                            }
                            else {
                                thisContainer.querySelector(".mig-youtube-wrapper").style.position = "relative";
                            }
                        })

                    }
                    else {
                        delete customoptions.width;
                    }


                }


                let finaloptions = { ...defaultoptions, ...customoptions };
            (customoptions.start !== null)? finaloptions.playerVars.start = customoptions.start : "";
            (customoptions.end !== null)? finaloptions.playerVars.end = customoptions.end : "";
            if(customoptions.controls === "yes") {
                finaloptions.playerVars.controls = 2;
                if(thisContainer.querySelector(".mig-youtube-overlay") != null){
                    thisContainer.querySelector(".mig-youtube-overlay").style.display = "none";
                }
        
                if(thisContainer.querySelector(".mig-youtube-loader") != null){
                    thisContainer.querySelector(".mig-youtube-loader").style.display = "none";
                }

            } 
    
                
                //ASIGN AN ID INDEX DEPENDENT AND THEN INSERT IN THE MAIN OBJECT LO RESCUE LATER ON YOUTUBE FUNCTION
                thisContainer.querySelector(".mig-youtube-wrapper").setAttribute("id", `mig-youtube-wrapper-${index}`);
            
            
                finaloptions.selector = `mig-youtube-wrapper-${index}`;
                migYoutubePlayers.push(finaloptions);
                thisContainer.querySelector(".mig-youtube-wrapper-iframe").setAttribute("data-youtubebg", JSON.stringify(finaloptions));
                
            }
           
        }) // end of foreach


        mainWindow.onYouTubeIframeAPIReady = function onYouTubeIframeAPIReady() {
            let ytPlayers = window.migYoutubePlayers;

            ytPlayers.forEach(function(player){
                let selector = document.querySelector(`#${player.selector}`).querySelector(".mig-youtube-wrapper-iframe");
                let playerOptions = {
                    height: player.height,
                    width: player.width,
                    videoId: player.videoId,
                    playerVars: player.playerVars,
                    events: player.events
                }
                
                new YT.Player(selector, playerOptions);
            })
            
        }

        // 4. The API will call this function when the video player is ready.
        function migYTReady(event) {
            let windowWidth = window.screen.width;
            let iframe = event.target.getIframe();
        
            
            let data = JSON.parse(iframe.getAttribute("data-youtubebg"));
            let id = `migYt-${iframe.getAttribute("id")}`;
            if(data.muted == "true"){
                event.target.mute();
            }
            if(windowWidth < 980){
                event.target.mute();
            }
            
            

            setTimeout(function(){
                if(window.migYtplayersLoaded[id] != "loaded"){
                    console.log("muting video and try to play again");
                    event.target.mute();
                    event.target.playVideo();
                }

            }, 1500);
            

            event.target.playVideo();
            window.migYtplayersLoaded[id] = "unloaded";
            
        }

        function migYTPlay(event){
            let iframe = event.target.getIframe();

            var done = false;
            let data = JSON.parse(iframe.getAttribute("data-youtubebg"));
            let selector = document.querySelector(`#${data.selector}`);
            let loaderContainer = selector.nextSibling;
            let id = `migYt-${iframe.getAttribute("id")}`;

            if (event.data == YT.PlayerState.PLAYING && !done) {
                
                window.migYtplayersLoaded[id] = "loaded";
               
                if (data.preloader != "none") {
                    if (loaderContainer.classList.contains("mig-youtube-loader")) {
                        
                        setTimeout(function () {
                            loaderContainer.style.backgroundColor = "transparent";
                            loaderContainer.style.backgroundImage = "none";
                        }, data.delay);
                    }
                }
            }
            else if(event.data == 0 && data.loop == "true"){
                event.target.seekTo(data.playerVars.start);
            }

        }


        function migYTError(event){
          
        }

    })


};
migyoutubeplayer();

