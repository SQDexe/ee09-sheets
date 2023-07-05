const exit = () =>  window.location = "https://sqdexe.github.io";
const load = () => {
    const url = "https://api.github.com/repos/SQDexe/ee09-sheets/contents/sheets";

    let content = null;
    $.getJSON(url)
        .done(data => {
            let list = $("<ul></ul>");

            data.sort((a, b) => {
                let names = [a, b].map(elem => elem.name.split("-")),
                    dates = names.map(elem => new Date([2000 + Number(elem[0]), Number(elem[1]), Number(elem[2])].join("-")));
                return dates[0].getTime() < dates[1].getTime() ? -1 : 1;
                });
            for (let folder of data) {
                let idNumber = folder.name.split("-"),
                    details = $("<details></details>")
                    .append($("<summary></summary>")
                        .text(`${ idNumber[1].padStart(2, "0") }.20${ idNumber[0] } - ${ idNumber[2] }`));

                let innerContent = null;
                $.getJSON(url + "/" + folder.name)
                    .done(innerData => {
                        let innerList = $("<ul></ul>");

                        for (let file of innerData) {
                            innerList.append($("<li></li>")
                                .append($("<a></a>")
                                    .attr({
                                        "href": file.download_url,
                                        "download": file.name,
                                        "target": "_blank"
                                        })
                                    .text(file.name)));
                            }
                        details.append(innerList);
                        })
                    .fail((jqXHR) => innerContent = $("<div></div>")
                        .addClass("error")
                        .text("Błąd - " + jqXHR.status))
                    .always(() => list.append($("<li></li>")
                            .append(details
                                .append(innerContent))));
                }
            content = list;
            })
        .fail((jqXHR)=> content = $("<div></div>")
            .addClass("error")
            .text("Błąd - " + jqXHR.status))
        .always(() => $("#list")
            .empty()
            .append(content));
    }
$(document).ready(() => {
    $("#exit button").click(exit);
    load();
    });