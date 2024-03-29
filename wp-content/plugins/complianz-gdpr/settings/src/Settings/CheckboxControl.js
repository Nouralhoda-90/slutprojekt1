/*
* The tooltip can't be included in the native toggleControl, so we have to build our own.
*/

const CheckboxControl = (props) => {
	const onChangeHandler = (e) => {
		let fieldValue = !props.field.value;
		props.onChangeHandler(fieldValue)
	}

	const handleKeyDown = (e) => {
		if (e.key === 'Enter') {
			e.preventDefault();
			onChangeHandler(true);
		}
	}

	let field = props.field;
	let is_checked = field.value ? 'is-checked' : '';
	let is_disabled = props.disabled ? 'is-disabled' : '';

	return (
			<div className="components-base-control components-toggle-control">
				<div className="components-base-control__field">
					<div data-wp-component="HStack" className="components-flex components-h-stack">
                        <span className={ "components-form-toggle "+is_checked + ' ' +is_disabled}>
                            <input
								onKeyDown={(e) => handleKeyDown(e)}
								checked={field.value}
								className="components-form-toggle__input"
								onChange={ ( e ) => onChangeHandler(e) }
								id={field.id}
								type="checkbox"
								disabled={props.disabled}
							/>
                        <span className="components-form-toggle__track"></span>
                        <span className="components-form-toggle__thumb"></span>
                        </span>
						{props.label}
					</div>
				</div>
			</div>
	);
}
export default CheckboxControl
