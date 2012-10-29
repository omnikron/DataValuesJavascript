/**
 * @file
 * @ingroup DataValues
 *
 * @licence GNU GPL v2+
 *
 * @author Daniel Werner
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
( function( dv, $, undefined ) {
'use strict';

var PARENT = dv.DataValue,
	constructor = function( value ) {
		this.value = value;
	};

/**
 * Constructor for creating a data value representing a string.
 *
 * @constructor
 * @extends dv.Value
 * @since 0.1
 *
 * @param {String} value
 */
dv.StringValue = dv.util.inherit( PARENT, constructor, {

	/**
	 * @see dv.DataValue.getType
	 *
	 * @since 0.1
	 *
	 * @return String
	 */
	getType: function() {
		return 'string';
	},

	/**
	 * @see dv.DataValue.getSortKey
	 *
	 * @since 0.1
	 *
	 * @return String|Number
	 */
	getSortKey: function() {
		return this.value;
	},

	/**
	 * @see dv.DataValue.getValue
	 *
	 * @since 0.1
	 *
	 * @return mixed
	 */
	getValue: function() {
		return this.value;
	},

	/**
	 * @see dv.DataValue.equals
	 *
	 * @since 0.1
	 *
	 * @return Boolean
	 */
	equals: function( value ) {
		if ( !( value instanceof dv.StringValue ) ) {
			return false;
		}

		return this.value === value.getValue();
	},

	/**
	 * @see dv.DataValue.toJSON
	 *
	 * @since 0.1
	 *
	 * @return Object
	 */
	toJSON: function( value ) {
		return this.value;
	}

} );

dv.StringValue.newFromJSON = function( json ) {
	return new dv.StringValue( json );
};

}( dataValues, jQuery ) );
