{"version":3,"sources":["editor.js"],"names":["BX","namespace","resolver","currentImage","license","JSON","stringify","owner","version","enterprise_license","available_actions","features","platform","app_identifiers","api_token","domains","issued_at","expires_at","signature","Main","ImageEditor","predefinedOptions","this","popup","PopupWindow","util","getRandomString","zIndex","width","window","innerWidth","height","innerHeight","overlay","noAllPaddings","className","animationOptions","show","eventType","close","events","onPopupClose","bind","loader","Loader","onWindowResize","ratio","CUSTOM","SQUARE","4/3","16/9","PROFILE","FB_AD","FB_POST","FB_COVER","renderType","BASE64","IMAGE","BUFFER","BLOB","MSBLOB","createSDKInstance","image","options","assets","forceCrop","controlsOptions","library","type","isPlainObject","Object","assign","transform","isArray","categories","forEach","category","ratios","ratioItem","dimensions","PhotoEditorSDK","Math","Vector2","exportParams","download","export","megapixels","isNumber","defaultControl","isString","UI","DesktopUI","container","baseUrl","showHeader","responsive","preloader","versionCheck","logLevel","language","editor","preferredRenderer","maxMegaPixels","desktop","displayCloseButton","extensions","languages","ru","ImageEditorLocale","prepareImage","proxy","Promise","resolve","reject","src","Image","add_url_param","sessid","bitrix_sessid","url","complete","onload","onerror","getFileName","split","pop","getInstance","instance","prototype","edit","Error","contentContainer","document","documentElement","style","overflow","onCustomEvent","popupContainer","then","imageInstance","dependencies","loadExt","SDKInstance","on","onExport","hide","catch","setContent","createErrorMessage","create","props","children","html","message","text","click","apply","off","dispose","innerHTML","result","getOptions","fileName","splitted","base64Data","format","match","RegExp","replace","setWidth","setHeight"],"mappings":"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","file":"editor.map.js"}