
export function getNextUrl(linkArr) {
  return linkArr.filter(link => {
    if (link.label.split(' ').includes("Next")) {
      return link.url
    }
  }).pop();
}

export function getPrevUrl(linkArr) {
  return linkArr.filter(link => {
    if (link.label.split(' ').includes("Previous")) {
      return link.url
    }
  }).pop();
}