
function removeSpaces(string) {
 return string.split(' ').join('');
}

function capitalize(s)
{
    return s[0].toUpperCase() + s.slice(1);
}


function letters(value) {
    return /^\d*\.?\d*$/.test(value);
}