let head = document.createElement('template');
const imgDir = '/images/';

head.innerHTML = `
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" sizes="180x180" href="${imgDir}apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="${imgDir}favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="${imgDir}favicon-16x16.png">
    <link rel="manifest" href="${imgDir}site.webmanifest">
    <link rel="mask-icon" href="i${imgDir}safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="${imgDir}favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="author" content="Souna">
    <meta name="description" content="Site officiel de Souna wola">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c08589246e.js" crossorigin="anonymous"></script>
`;

document.head.appendChild(head.content);