(function(){

    const bookmarkButtonContainer = document.getElementById('bookmark_popup');
    const bookmarkButtonAdd = document.getElementById('bookmark_create');
    const bookmarkButtonCancel = document.getElementById('bookmark_cancel');
    const bookmarkContainer = document.getElementById('bookmark_list');
    const bookmarkInnerList = document.querySelector('.bookmark-list');
    const bookmarkNoneWarning = document.querySelector('.no-bookmarks');
    const bookmarkSearch = document.getElementById('bookmark_search');
    const chapters = document.getElementsByClassName('chapter-permalink');
    const chapterContent = document.getElementById('chapter_content');
    const fontRange =  document.querySelector('#font_range > input');
    const jsElements = document.getElementsByClassName('js-load');
    const reader = document.getElementById('reader');
    const readerInner = document.getElementById('main_reader_inner');
    const readerButtonScrollUp = document.getElementById('button_scroll_up');
    const sidebarCloseButtons = document.getElementsByClassName('close-sidebar');
    const sidebarOpenButtons = document.getElementsByClassName('toggle-sidebar');



    // INITIALIZE BEHAVIOURS
    readerInner.scrollTopLast = readerInner.scrollTop;
    window.scrollYLast = window.scrollY;





    // INITIALIZE THE ACTIVE CHAPTER PERMALINK ACCORDING TO THE WINDOW'S CURRENT HASH
    if(window.location.hash){

        for( var i = 0; i < chapters.length; i++ ){

            if( chapters[i].getAttribute('href') === window.location.hash ){

                chapters[i].classList.add('state-active');

            }

        }

        if(window.location.hash !== '#chapter_one'){

            document.getElementById('chapter_list').classList.add('state-not-initial');

        }

    }




    // INITIALIZE THE SELECTION OF THE BOOKMARKS BASED ON THEIR PHP-LOADED DATA ATTRIBUTES

    if(bookmarkInnerList.children.length > 0){

        const selection = window.getSelection ? window.getSelection() : document.selection;

        const bookmarkInvalidArray = [];

        for(var x = 0; x < bookmarkInnerList.children.length; x++){

            const bookmarkEntry = bookmarkInnerList.children[x];

            const endNodeOffset = bookmarkEntry.dataset.endNodeOffset;
            const endNodePath = bookmarkEntry.dataset.endNodePath;
            const startNodeOffset = bookmarkEntry.dataset.startNodeOffset;
            const startNodePath = bookmarkEntry.dataset.startNodePath;

            try{

                const startNode = nodeAtPathFromChunk(chapterContent, startNodePath);
                const endNode = nodeAtPathFromChunk(chapterContent, endNodePath);

                const range = document.createRange();
                      range.setStart(startNode, startNodeOffset);
                      range.setEnd(endNode, endNodeOffset);

                bookmarkEntry.children[1].children[1].innerText = range.toString();

            } catch(err) {

                if(err.name === "TypeError"){

                    console.log('There was an error validating one of your bookmarks. This bookmark will be deleted.');

                    const delIndex = Array.prototype.indexOf.call(bookmarkInnerList.children, bookmarkEntry);

                    bookmarkInvalidArray.push(delIndex);
                }

            }

        }

        if(bookmarkInvalidArray.length > 0){

           removeBookmarks(bookmarkInvalidArray);

        }


    } else {

        bookmarkNoneWarning.classList.remove('state-hidden');

    }




    // ADD EVENT LISTENER TO POPUP BOOKMARK BUTTON WHEN NON EMPTY STRING VALUE SELECTION IS MADE

    document.addEventListener("selectionchange", function(){

        var selection = window.getSelection ? window.getSelection() : document.selection;

        if(selection.toString() !== '' && elementContainsSelection(document.getElementById('chapter_content'))){

            const range = selection.getRangeAt(0);
            const rangeDetails = range.getBoundingClientRect();
            const reader = document.getElementById('main_reader');


            // Selection top (relative to window) + Reader top (relative to window) + Reader scroll + Bookmark ClientHeight + Small Offset for space.
            const y = rangeDetails.bottom + readerInner.scrollTop - reader.getBoundingClientRect().top + bookmarkButtonContainer.clientHeight + 15;
            bookmarkButtonContainer.style.top = y + "px";


            // Calculates the center of the selection through averages.
            var x = ( rangeDetails.width / 2 ) + rangeDetails.left;

            // Math to make sure that the bookmark button does not overflow off the page, and move bookmark arrow accordingly.
            if( x - (bookmarkButtonContainer.clientWidth / 2) <= 0){

                bookmarkButtonContainer.children[0].style.left = x + "px";
                x = (bookmarkButtonContainer.clientWidth / 2) + 15;

            } else if( x + 30 + ( bookmarkButtonContainer.clientWidth / 2 ) >= window.innerWidth ){

                const right = x - bookmarkButtonContainer.getBoundingClientRect().left;
                bookmarkButtonContainer.children[0].style.left = right + "px";
                x = window.innerWidth - (bookmarkButtonContainer.clientWidth / 2) - 15;

            } else {

                bookmarkButtonContainer.children[0].style.left =  "50%";

            }

            bookmarkButtonContainer.style.left = x + "px";

            bookmarkButtonContainer.classList.add('state-active');

          } else {
                
            bookmarkButtonContainer.classList.remove('state-active');

          }

    }, false);

    window.addEventListener('hashchange', function(){

            const chapters = document.getElementsByClassName('chapter-permalink');

            const reader = document.getElementById('reader');

            bookmarkButtonContainer.classList.remove('state-active');

            const chapter = document.querySelector('.chapter-permalink[href="' + window.location.hash + '"]');

            reader.dataset.chapterIndex = Array.prototype.indexOf.call(chapters, chapter);

            document.getElementById('chapter_list').classList.remove('state-active');

            for(var j = 0; j < chapters.length; j++){

                chapters[j].classList.remove('state-active');

            }

            chapter.classList.add('state-active');

            if(reader.dataset.chapterIndex != 0){

                document.getElementById('chapter_list').classList.add('state-not-initial');

            } else {

                document.getElementById('chapter_list').classList.remove('state-not-initial');

            }

    });


    window.addEventListener('resize', function(){

        const bookmarkButtonContainer = document.getElementById('bookmark_popup');

        bookmarkButtonContainer.classList.remove('state-active');
        bookmarkButtonContainer.style.left = "0px";
        bookmarkButtonContainer.style.top = "-100px";

    });


    bookmarkButtonAdd.addEventListener("click", function(){

        const selection = window.getSelection ? window.getSelection() : document.selection;

        if(selection.toString() !== ''){

            const range = selection.getRangeAt(0);
            const reader = document.getElementById('reader');


            let siteUrl = window.location.href;
            let currentChapterUrl = siteUrl.substring(55);
            let chapterIndex;
            // console.log(currentChapterUrl);
            switch(currentChapterUrl){
                case 'zero':
                    chapterIndex = '0';
                    break;
                case 'one':
                    chapterIndex = '1';
                    break;
                case 'two':
                    chapterIndex = '2';
                    break;
                case 'three':
                    chapterIndex = '3';
                    break;
                case 'four':
                    chapterIndex = '4';
                    break;
                case 'five':
                    chapterIndex = '5';
                    break;
                case 'six':
                    chapterIndex = '6';
                    break;
                case 'seven':
                    chapterIndex = '7';
                    break;
                case 'eight':
                    chapterIndex = '8';
                    break;
                case 'nine':
                    chapterIndex = '9';
                    break;    
            }   
            // const chapterIndex = reader.dataset.chapterIndex;
            const endNodeOffset = range.endOffset;
            const endNodePath = pathToChunk(range.endContainer);
            const startNodeOffset = range.startOffset;
            const startNodePath = pathToChunk(range.startContainer);

            const params = {
                chapterIndex: chapterIndex,
                endNodePath: endNodePath,
                endNodeOffset: endNodeOffset,
                startNodePath: startNodePath,
                startNodeOffset: startNodeOffset,
            }

            sendXMLRequest('SET_BOOKMARK', params, function(){
                bookmarkButtonContainer.classList.add('state-added');
                bookmarkButtonContainer.style.opacity = 0;

                setTimeout(function(){
                    this.style.opacity = "";
                    this.classList.remove('state-active');
                    this.classList.remove('state-added');
                }.bind(bookmarkButtonContainer),
                1500);

                bookmarkNoneWarning.classList.add('state-hidden');

                const clone = document.querySelector('.bookmark-entry-template').cloneNode(true);
                
                clone.classList.remove('bookmark-entry-template');
                clone.dataset.chapterIndex = chapterIndex;
                clone.dataset.endNodePath = endNodePath;
                clone.dataset.endNodeOffset = endNodeOffset;
                clone.dataset.startNodePath = startNodePath;
                clone.dataset.startNodeOffset = startNodeOffset;
                clone.children[1].children[0].children[0].innerHTML = chapters[chapterIndex].dataset.chapterName + " - " + reader.dataset.currentDate;
                clone.children[1].children[1].innerHTML = selection.toString();

                bookmarkInnerList.prepend(clone);
            });

        }

    }, false);




    bookmarkButtonCancel.addEventListener('click', function(){

        this.parentNode.classList.remove('state-active');

    });





    bookmarkContainer.addEventListener('click', function(event){

        if(event.target.classList.contains('bookmark-reveal')){

            const targetNode = event.target.parentNode;

            const startNodePath = targetNode.dataset.startNodePath;
            const startNodeOffset = targetNode.dataset.startNodeOffset;
            const chapterIndex = targetNode.dataset.chapterIndex;
            const endNodePath = targetNode.dataset.endNodePath;
            const endNodeOffset = targetNode.dataset.endNodeOffset;
            
            chapters[chapterIndex].click();
            
            const selection = window.getSelection ? window.getSelection() : document.selection;

              if (selection.removeAllRanges) {
                selection.removeAllRanges();
              } else if (selection.empty) {
                selection.empty();
              }

            const startNode = nodeAtPathFromChunk(chapterContent, startNodePath);
            const endNode = nodeAtPathFromChunk(chapterContent, endNodePath);

            const range = document.createRange();
            range.setStart(startNode, startNodeOffset);
            range.setEnd(endNode, endNodeOffset);

            selection.addRange(range);

            document.getElementById('button_scroll_up').classList.remove('state-shifted');
            document.getElementById('font_range').classList.remove('state-shifted');
            bookmarkContainer.classList.remove('state-active');
            readerInner.classList.remove('state-shrunk');
            scrollToY('main_reader_inner',startNode.parentNode.offsetTop - 60, 1500, 'easeInOutQuint');
            bookmarkButtonContainer.style.top = "-100px";

        } else if(event.target.classList.contains('bookmark-delete')){

            const reader = document.getElementById('reader');

            const delIndex = Array.prototype.indexOf.call(bookmarkInnerList.children, event.target.parentNode);

            sendXMLRequest('DEL_BOOKMARK', delIndex, function(){
                const nodeToDelete = bookmarkInnerList.children[delIndex];
                bookmarkInnerList.removeChild(nodeToDelete);
            });

        }


    }, true);





    bookmarkSearch.addEventListener('input', function(){

        if(bookmarkSearch.value !== ""){

            bookmarkSearch.classList.add('state-active');

            for( var i = 0; i < bookmarkInnerList.children.length ; i++ ){

                if(bookmarkInnerList.children[i].children[1].children[1].innerText.toLowerCase().indexOf(bookmarkSearch.value.toLowerCase()) === -1 ){

                    bookmarkInnerList.children[i].classList.add('state-hidden');

                }  else  {

                    bookmarkInnerList.children[i].classList.remove('state-hidden');

                }

            }

        } else {

            bookmarkSearch.classList.remove('state-active');

            for( var i = 0; i < bookmarkInnerList.children.length ; i++ ){

                bookmarkInnerList.children[i].classList.remove('state-hidden');

            }

        }

    });




    fontRange.addEventListener('input', function(){

        bookmarkButtonContainer.classList.remove('state-active');

        changeFontSize(this.value);

    })





    readerInner.addEventListener('scroll', function(){

        const thisScrollTop = this.scrollTop;
        const thisHeight = this.clientHeight;
        const innerHeight = this.children[0].clientHeight;

        var percentageRead = ( thisScrollTop / ( innerHeight - thisHeight ) );

        percentageRead = ( percentageRead > 1 ) ? 1 : percentageRead;

        document.querySelector('.chapter-permalink.state-active > .chapter-entry > .chapter-percentage').style.transform = 'scaleX(' + percentageRead + ')';

        //#main_reader_inner Scrolling Down
        if(this.scrollTop > this.scrollTopLast){

            document.getElementById('button_scroll_up').classList.remove('state-active');

        //#main_reader_inner Scrolling Up
        } else {

            document.getElementById('button_scroll_up').classList.add('state-active');

        }

        this.scrollTopLast = this.scrollTop;

    });


    readerInner.addEventListener('scroll', function(){

        if( this.scrollTop === (this.scrollHeight - this.offsetHeight)) {

            sendXMLRequest('MARK_READ', window.location.hash.substring(1));

            const chapter = document.querySelector('.chapter-permalink[href="' + window.location.hash + '"]');

            chapter.classList.add('state-completed');

        }

    });




    readerButtonScrollUp.addEventListener('click', function(){

        scrollToY(null,0, 1500, 'easeInOutQuint');

        this.classList.remove('state-active');

    });




    for( var i = 0; i < chapters.length ; i++ ){

        chapters[i].addEventListener('click', function(event){

            if(event.srcElement.tagName === "INPUT"){

                event.preventDefault();
                event.stopPropagation();

                if(this.classList.contains('state-completed')){
                    sendXMLRequest('MARK_UNREAD', this.hash.substring(1));
                    this.classList.remove('state-completed');
                } else {
                    sendXMLRequest('MARK_READ', this.hash.substring(1));
                    this.classList.add('state-completed');
                }

                return false;

            }

            sendXMLRequest('MARK_LAST_READ', this.hash.substring(1));

            const chapters = document.getElementsByClassName('chapter-permalink');

            const reader = document.getElementById('reader');

            bookmarkButtonContainer.classList.remove('state-active');

            reader.dataset.chapterIndex = Array.prototype.indexOf.call(this.parentNode.children, this);

            document.getElementById('chapter_list').classList.remove('state-active');

            for(var j = 0; j < chapters.length; j++){

                chapters[j].classList.remove('state-active');

            }

            this.classList.add('state-active');


            if(reader.dataset.chapterIndex != 0){

                document.getElementById('chapter_list').classList.add('state-not-initial');

            } else {

                document.getElementById('chapter_list').classList.remove('state-not-initial');

            }

        });

    }



    for( var i = 0; i < jsElements.length ; i++ ){

        jsElements[i].classList.add('js-loaded');

    }




    for( var i = 0; i < sidebarOpenButtons.length ; i++ ){

        sidebarOpenButtons[i].addEventListener('click', function(event){

            event.preventDefault();

            document.querySelector(this.getAttribute('href')).classList.add('state-active');

            if(this.getAttribute('href') === '#bookmark_list'){

                document.getElementById('button_scroll_up').classList.add('state-shifted');
                document.getElementById('font_range').classList.add('state-shifted');
                document.getElementById('main_reader_inner').classList.add('state-shrunk');

            }

        });

    }





    for( var i = 0; i < sidebarCloseButtons.length ; i++ ){

        sidebarCloseButtons[i].addEventListener('click', function(event){

            event.preventDefault();

            this.parentNode.classList.remove('state-active');

            if( this.parentNode.id === "bookmark_list" ){

                bookmarkSearch.value = "";
                for(var j = 0; j < bookmarkInnerList.children.length; j++){
                    bookmarkInnerList.children[j].classList.remove('state-hidden');
                }

                document.getElementById('button_scroll_up').classList.remove('state-shifted');
                document.getElementById('font_range').classList.remove('state-shifted');
                document.getElementById('main_reader_inner').classList.remove('state-shrunk');

            }

        });

    }



    // HELPER FUNCTIONS

    window.requestAnimFrame = (function(){
      return  window.requestAnimationFrame       ||
              window.webkitRequestAnimationFrame ||
              window.mozRequestAnimationFrame    ||
              function( callback ){
                window.setTimeout(callback, 1000 / 60);
              };
    })();


    function scrollToY(scrollTargetId, scrollTargetY, speed, easing) {
        // scrollTargetY: the target scrollY property of the window
        // speed: time in pixels per second
        // easing: easing equation to use

        if(scrollTargetId){

            var scrollTarget = document.getElementById(scrollTargetId);
            var scrollY = scrollTarget.scrollTop;

        } else {

            var scrollY = window.scrollY || document.documentElement.scrollTop;

        }

        var scrollTargetY = scrollTargetY || 0,
            speed = speed || 2000,
            easing = easing || 'easeOutSine',
            currentTime = 0;

        // min time .1, max time .8 seconds
        var time = Math.max(.1, Math.min(Math.abs(scrollY - scrollTargetY) / speed, .8));

        // easing equations from https://github.com/danro/easing-js/blob/master/easing.js
        var easingEquations = {
            easeOutSine: function (pos) {
                return Math.sin(pos * (Math.PI / 2));
            },
            easeInOutSine: function (pos) {
                return (-0.5 * (Math.cos(Math.PI * pos) - 1));
            },
            easeInOutQuint: function (pos) {
                if ((pos /= 0.5) < 1) {
                    return 0.5 * Math.pow(pos, 5);
                }
                return 0.5 * (Math.pow((pos - 2), 5) + 2);
            }
        };

        // add animation loop
        if(scrollTargetId){
            function tick() {
                currentTime += 1 / 60;

                var p = currentTime / time;
                var t = easingEquations[easing](p);

                if (p < 1) {
                    requestAnimFrame(tick);
                    scrollTarget.scrollTop = (0, scrollY + ((scrollTargetY - scrollY) * t));
                } else {
                    scrollTarget.scrollTop = (0, scrollTargetY);
                }
            }
        } else {
            function tick() {
                currentTime += 1 / 60;

                var p = currentTime / time;
                var t = easingEquations[easing](p);

                if (p < 1) {
                    requestAnimFrame(tick);
                    window.scrollTo(0, scrollY + ((scrollTargetY - scrollY) * t));
                } else {
                    window.scrollTo(0, scrollTargetY);
                }
            }
        }

        // call it once to get started
        tick();
    }


    function changeFontSize(val){
      document.getElementById('main_reader').style.fontSize = val + 'px';
    }


    function elementContainsSelection(el) {
        var sel;
        if (window.getSelection) {
          sel = window.getSelection();
            if (sel.rangeCount > 0) {
              for (var i = 0; i < sel.rangeCount; ++i) {
                if (!isOrContains(sel.getRangeAt(i).commonAncestorContainer, el)) {
                    return false;
                  }
              }
              return true;
            }
        } else if ( (sel = document.selection) && sel.type != "Control") {
          return isOrContains(sel.createRange().parentElement(), el);
        }
        return false;
    }


    function isChunk(node) {
      if (node == undefined || node == null) {
        return false;
      }
      return node.id == "chapter_content";
    }


    function isOrContains(node, container) {
        while (node) {
            if (node === container) {
                return true;
            }
            node = node.parentNode;
        }
        return false;
    }

    function getDocHeight() {
        var D = document;
        return Math.max(
            D.body.scrollHeight, D.documentElement.scrollHeight,
            D.body.offsetHeight, D.documentElement.offsetHeight,
            D.body.clientHeight, D.documentElement.clientHeight
        );
    }


    function nodeAtPathFromChunk(chunk, path) {
      var components = path.split("/");
      var node = chunk;
      for (i in components) {
        var component = components[i];
        node = node.childNodes[component];
      }
      return node;
    }


    function pathToChunk(node) {
      var components = new Array();

      // While the last component isn't a chunk
      var found = false;
      while (found == false) {
        var childNodes = node.parentNode.childNodes;
        var children = new Array(childNodes.length);
        for (var i = 0; i < childNodes.length; i++) {
          children[i] = childNodes[i];
        }        
        components.unshift(children.indexOf(node));

        if (isChunk(node.parentNode) == true) {
          found = true
        } else {
          node = node.parentNode;
        }
      }

      return components.join("/");
    }

    function removeBookmarks(array){

        const arrayOfIndexes = array;

        const indexToRemove = arrayOfIndexes.shift();

        for(var i = 0; i < arrayOfIndexes.length; i++){
            arrayOfIndexes[i] = arrayOfIndexes[i] - 1;}

        sendXMLRequest('DEL_BOOKMARK', indexToRemove, function(){

            const nodeToDelete = bookmarkInnerList.children[indexToRemove];
            bookmarkInnerList.removeChild(nodeToDelete);

            if(arrayOfIndexes.length > 0){
                removeBookmarks(arrayOfIndexes);}

        });

    }


    function serialize(obj){
      var str = [];
      for(var p in obj)
        if (obj.hasOwnProperty(p)) {
          str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        }
      return str.join("&");
    }

    function sendXMLRequest(action, actionData, callback=null){

        const params = {
            action: action,
            action_data: actionData,
            id: document.getElementById('reader').dataset.productId
        }

        if( (typeof actionData === "object") && (actionData !== null) ){

            const keys = Object.keys(actionData);

            for(var i = 0; i < keys.length; i++){

                params[keys[i]] = actionData[keys[i]];

            }

        }

        // console.log(params);

        var req = new XMLHttpRequest();

        req.open("POST", reader.dataset.apiUrl, true);

        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        req.onreadystatechange = function() {

            if (req.readyState == XMLHttpRequest.DONE && req.status === 200) {

                const data = JSON.parse(req.responseText);

                // console.log(data);

                if(callback){ callback(); }

            }

        }

        req.send(serialize(params));

    }

})();