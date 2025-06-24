/**
 * Fraud detection functionality - provide auto-filed, pasted field names.
 * @type {{pastedFields: *[], currentResolution: string, pluginList: (string|*[]), screenResolution: string, autoFillFields: *[]}}
 */
const fraudDetection = {
  autoFillFields: [],
  pastedFields: [],
  screenResolution: "",
  currentResolution: "",
  pluginList: JSON.stringify(navigator.plugins) ?? [],
};

const detectBrowser = () => {
  const retrieveBrowserInfo = (regexp) =>
    regexp.test(window.navigator.userAgent);
  switch (true) {
    case retrieveBrowserInfo(/edg/i):
      return "Microsoft Edge";
    case retrieveBrowserInfo(/firefox|fxios/i):
      return "Mozilla Firefox";
    case retrieveBrowserInfo(/opr\//i):
      return "Opera";
    case retrieveBrowserInfo(/ucbrowser/i):
      return "UC Browser";
    case retrieveBrowserInfo(/samsungbrowser/i):
      return "Samsung Browser";
    case retrieveBrowserInfo(/chrome|chromium|crios/i):
      return "Google Chrome";
    case retrieveBrowserInfo(/safari/i):
      return "Apple Safari";
    default:
      return "Other";
  }
};

const checkAudioFormatSupport = function() {
  const audioFormats = [{
    format: "audio/mpeg",
    description: "MP3",
  },
    {
      format: "audio/ogg",
      description: "Ogg Vorbis",
    },
    {
      format: "audio/wav",
      description: "WAV",
    },
    {
      format: "audio/aac",
      description: "AAC",
    },
  ];
  
  const supportedFormats = [];
  const audioElement = new Audio();
  
  for (const formatInfo of audioFormats) {
    if (
      audioElement.canPlayType(formatInfo.format) === "probably" ||
      audioElement.canPlayType(formatInfo.format) === "maybe"
    ) {
      supportedFormats.push(formatInfo.description);
    }
  }
  
  return supportedFormats;
};

const checkVideoFormatSupport = function() {
  const videoFormats = [{
    format: "video/mp4",
    description: "MP4",
  },
    {
      format: "video/webm",
      description: "WebM",
    },
    {
      format: "video/ogg",
      description: "Ogg Theora",
    },
  ];
  
  const supportedFormats = [];
  const videoElement = document.createElement("video");
  
  for (const formatInfo of videoFormats) {
    if (
      videoElement.canPlayType(formatInfo.format) === "probably" ||
      videoElement.canPlayType(formatInfo.format) === "maybe"
    ) {
      supportedFormats.push(formatInfo.description);
    }
  }
  
  return supportedFormats;
};

const getCurrentResolution = function() {
  return window.innerWidth + "x" + window.innerHeight;
};

const getScreenResolution = function() {
  return screen.width + "x" + screen.height;
};

const updateResolutions = function() {
  fraudDetection.screenResolution = getScreenResolution();
  fraudDetection.currentResolution = getCurrentResolution();
};

const setupAddressFraudDetection = function() {
  updateResolutions();
  
  window.onload = updateResolutions;
  window.onresize = updateResolutions;
  
  // Attach the paste event listener to each input field.
  const inputFields = document.getElementById("address_additional_data").getElementsByTagName("input");
  const selectFields = document.getElementById("address_additional_data").getElementsByTagName("select");
  
  for (let i = 0; i < inputFields.length; i++) {
    if (inputFields[i].addEventListener) {
      inputFields[i].addEventListener("paste", handlePaste);
      inputFields[i].addEventListener("input", handleInput);
    }
  }
  for (let i = 0; i < selectFields.length; i++) {
    if (selectFields[i].addEventListener) {
      selectFields[i].addEventListener("paste", handleSelect);
      selectFields[i].addEventListener("change", handleSelect);
    }
  }
  
  // Handle the paste event
  function handlePaste(event) {
    const field = event.target;
    const pastedValue = event.clipboardData.getData("text/plain");
    
    if (pastedValue !== "" && !fraudDetection.pastedFields.includes(field.id)) {
      fraudDetection.pastedFields.push(field.id);
    }
  }
  
  function handleInput(event) {
    const field = event.target;
    let autofilledInput;
    let autofill;
    
    try {
      autofill = field.matches("input:-internal-autofill-selected") || field.matches("input:autofill");
    } catch (error) {
      autofill = false;
    }
    
    if (autofill) {
      autofilledInput = autofill
    } else if (detectBrowser() === "Mozilla Firefox") {
      autofilledInput = event.inputType === "insertReplacementText";
    } else if (detectBrowser() == "Apple Safari") {
      autofilledInput = event.constructor.name === "CustomEvent";
    }
    
    if (autofilledInput && !fraudDetection.autoFillFields.includes(field.id)) {
      fraudDetection.autoFillFields.push(field.id);
    }
  }
  
  function handleSelect(event) {
    const field = event.target;
    let autofilledInput;
    let autofill;
    
    try {
      autofill = field.matches("select:-internal-autofill-selected") || field.matches("select:autofill");
    } catch (error) {
      autofill = false;
    }
    
    if (autofill) {
      autofilledInput = autofill;
    } else if (detectBrowser() === "Mozilla Firefox") {
      autofilledInput = event.inputType === "insertReplacementText";
    } else if (detectBrowser() == "Apple Safari") {
      autofilledInput = event.constructor.name === "CustomEvent";
    }
    
    if (autofilledInput && !fraudDetection.autoFillFields.includes(field.id)) {
      fraudDetection.autoFillFields.push(field.id);
    }
  }
};

const retrieveAddressAdditionalData = function() {
  let data = {
    autoFillFields: fraudDetection.autoFillFields,
    pastedFields: fraudDetection.pastedFields,
    screenResolution: fraudDetection.screenResolution,
    currentResolution: fraudDetection.currentResolution,
    pluginList: fraudDetection.pluginList,
    supportedAudioFormats: checkAudioFormatSupport(),
    supportedVideoFormats: checkVideoFormatSupport(),
  };
  
  let stringData = JSON.stringify(data);
  
  return btoa(stringData);
};

setupAddressFraudDetection();
