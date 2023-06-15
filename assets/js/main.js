const $ = require('jquery');

// setup an "add a tag" link
const $addInvoiceLineButton = $('<button type="button" class="add_invoice_line_link">Add a line item</button>');
const $newLinkLi = $('<li></li>').append($addInvoiceLineButton);

$(document).ready(function() {
    // Get the ul that holds the collection of tags
    const $collectionHolder = $('ul.invoice-lines');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addInvoiceLineButton.on('click', function(e) {
        // add a new tag form (see next code block)
        addInvoiceLineForm($collectionHolder, $newLinkLi);
    });
});

function addInvoiceLineForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    const prototype = $collectionHolder.data('prototype');

    // get the new index
    const index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    const newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    const $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);

    // add a delete link to the new form
    addInvoiceLineFormDeleteLink($newFormLi);
}

function addInvoiceLineFormDeleteLink($invoiceLineFormLi) {
    const $removeFormButton = $('<button type="button">Delete this line</button>');
    $invoiceLineFormLi.append($removeFormButton);

    $removeFormButton.on('click', function(e) {
        // remove the li for the tag form
        $invoiceLineFormLi.remove();
    });
}
