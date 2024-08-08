function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

function setCookie(name, value) {
    let cookie = getCookie(name) ?? value;
    if (!cookie.includes(value)) cookie = cookie + ',' + value;
    let d = new Date();
    d.setTime(d.getTime() + 86400000 * 10);
    document.cookie = name + "=" + cookie + "; expires=" + d.toUTCString() + "; path=/";
}

function removeCookieValue(name, valueToRemove) {
    let cookie = getCookie(name);

    if (cookie && valueToRemove) {
        const valuesArray = cookie.split(',');

        const updatedValues = valuesArray.filter(value => value !== valueToRemove);

        const updatedCookie = updatedValues.join(',');

        let d = new Date();
        d.setTime(d.getTime() + 86400000 * 10);
        document.cookie = name + "=" + updatedCookie + "; expires=" + d.toUTCString() + "; path=/";
    }
}

function isCookieValueExists(name, valueToCheck) {
    let cookie = getCookie(name);
    if (cookie && valueToCheck) {
        const valuesArray = cookie.split(',');
        return valuesArray.includes(valueToCheck);
    }
    return false;
}

export {getCookie, setCookie, removeCookieValue,isCookieValueExists}
