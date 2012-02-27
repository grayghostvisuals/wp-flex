// JavaScript Document

// typekit async config
TypekitConfig = {
  	kitId: 'xxxxxx', //add your kit unique id
  	scriptTimeout: 3000};
  	(function(){
  		var h = document.getElementsByTagName('html')[0];
  		h.className + 'wf-loading';
  		var t = setTimeout(function(){
  			h.className = h.className.replace(/(\s|^)wf-loading(\s|$)/g,'');
  			h.className += 'wf-inactive';
  			},
  			TypekitConfig.scriptTimeout);
  			var tk=document.createElement('script');
  			tk.src='//use.typekit.com/' + TypekitConfig.kitId + '.js';
  			tk.type='text/javascript';
  			tk.async='true';
  			tk.onload = tk.onreadystatechange = function(){
			var rs = this.readyState;
			if( rs && rs != 'complete' && rs!= 'loaded')
			return;
			clearTimeout(t);
			try{ Typekit.load(TypekitConfig) }
			catch(e){}
			};
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(tk,s);
	})();//end TypekitConfig