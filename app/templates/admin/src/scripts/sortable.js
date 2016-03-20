/**
 * --------------------------------
 *     SORTABLE 
 *
 *     Dependencies:
 *     - ImageSelect module
 *     - jQuery Sortable 
 * --------------------------------
 */

App.createModule( 'Sortable', (function (app) {
    
    var module = {};



    
    /**
     * Private variables
     */
    
    var

    ImageSelect = app.ImageSelect,

    $sortable = $('.js-sortable'),
    $sortableItemTemplate = $('#sortable-item-template .sortable-item').clone(),

    sortables = [],
    Sortable = {},
    SortableItem = {};

    // 
    // The Sortable Constructor
    // 
    Sortable = function ($container) {
        
        var _sortable = this;

        _sortable.id = guid();
        _sortable.$element = $container;
        _sortable.$input = $container.find('.js-sortable-input');
        _sortable.$container = $container.find('.js-sortable-container');
        _sortable.$add = $container.find('.js-add-sortable');
        _sortable.name = _sortable.$element.attr('name');
        _sortable.items = [];

        // setup data

        var inputData = _sortable.$input.val();

        if ( inputData ) {
            try {
                inputData = JSON.parse(_sortable.$input.val())
            } catch (e) {
                console.warn(e);
                inputData = {
                    name : _sortable.name,
                    items : []
                }
            }
        } else {
            inputData = {
                name : _sortable.name,
                items : []
            }
        }
        _sortable.data = inputData;
        

        // -- methods

        _sortable.createItemFromData = function (_item) {            
            var _sortableItem = new SortableItem(_item,_sortable);
            _sortable.items.push(_sortableItem);
            _sortableItem.$element.appendTo(_sortable.$container);
            _sortableItem.onInit();            
        }

        _sortable.updateData = function () {
            var newItems = [];            
            _sortable.items.forEach(function (_item) {
                var index = _item.$element.index();
                newItems[index] = (_item.data);
            });
            _sortable.data.items = newItems;
            _sortable.$input.val(JSON.stringify(_sortable.data));
            console.log('data updated');
        }


        // -- initial DOM updates

        if ( isArray(_sortable.data.items) ) {
            _sortable.data.items.forEach(_sortable.createItemFromData);
        }

        _sortable.$element.attr('id',_sortable.id);

        // -- binds

        _sortable.$add.on('click',function () {
            // new data according to homepage carousel
            var newData  = {
                'large-title' : 'New Item',
                'small-title' : '',
                'description' : '',
                'image'       : ''
            };
            _sortable.createItemFromData(newData);
        });

        // -- INIT

        _sortable.$container.sortable({
            update : _sortable.updateData
        });

    };

    // 
    // The Sortable Item Constructor
    // 
    SortableItem = function (data,parentSortable) {
        var _item = this;

        _item.data = data;
        _item.id = guid();
        _item.parentSortable = parentSortable;
        _item.$element = $sortableItemTemplate.clone();
        _item.$headingTitle = _item.$element.find('.sortable-item-heading');
        _item.$largeTitle = _item.$element.find('.sortable-item-title');
        _item.$remove = _item.$element.find('.sortable-item-remove');

        // -- homepage hero carousel - specific contents
              
        _item.$smallTitle = _item.$element.find('.sortable-item-small-title');
        _item.$description = _item.$element.find('.sortable-item-description');
        _item.$image = _item.$element.find('.sortable-item-image');

        // -- private functions

        function remove () {
            _item.$element.remove();
            var i = 0;
            while ( parentSortable.items[i] ) {
                if ( parentSortable.items[i].id == _item.id ) {
                    _item.$element.remove();
                    parentSortable.items.remove(i);
                    parentSortable.updateData();
                    break;
                }
                i++;
            }
        }

        // -- initial DOM updates

        _item.$element.attr('id',_item.id);
        _item.$smallTitle.val(_item.data['small-title']);
        _item.$largeTitle.val(_item.data['large-title']);        
        _item.$description.val(_item.data.description);
        _item.$image.val(_item.data.image);        

        // -- binds

        _item.$largeTitle.on('keyup change',function () {
            _item.$headingTitle.text(_item.$largeTitle.val());
        });
        _item.$remove.on('click',remove);
        // bind inputs
        _item.$smallTitle
        .add(_item.$largeTitle)
        .add(_item.$description)
        .add(_item.$image)
        .on('change keyup',function () {
            var $el = $(this),
                dataBind = $el.data('bind'),
                value = $el.val();
            _item.data[dataBind] = value;
            parentSortable.updateData();
        });

        // -- after initialization, run this func in the method which instantiated this

        _item.onInit = function () {
            ImageSelect.bindImageInput(_item.$element.find('.js-image-input'));
            _item.$largeTitle.trigger('change');
        }

        // -- INIT

    };




    /**
     * Private functions
     */
    
    function bindSortable ($elem) {
        
        var _sortable = new Sortable($elem);

        sortables.push(_sortable);

    }

    function getSortables () {
        return sortables;
    }




    /**
     * API
     */

    module.getSortables = getSortables;



    /**
     * Init
     * @return void
     */
    module.init = function () {

        if ( $sortable.length ) {
            $sortable.each(function () {
               bindSortable($(this)) ;
            });
        }        
        
    };

    return module;
})(App));