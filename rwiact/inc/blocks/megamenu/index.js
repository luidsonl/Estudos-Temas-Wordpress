var registerBlockType = wp.blocks.registerBlockType;

registerBlockType("rwiakt/megamenu",{
    edit: function(){
        return 'Edit';
    },
    save: function(){
        return 'Save';
    },
});