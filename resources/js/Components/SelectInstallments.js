import React, {useRef} from "react";
export default function SelectInstallment({
                                              options,
                                              name,
                                              value,
                                              className,
                                              handleChange,
                                              disabled
                                          }) {
    const select = useRef();

    return (
        <div className="flex flex-col items-start">
            <select
                name={name}
                value={value}
                className={`w-full border-r-0 border-l-0 border-t-0 border-b border-gray-500 bg-inherit pl-0 font-text shadow-none ring-0 focus:border-b-gray-600 focus:ring-0 pb-1 ${className}`}
                ref={select}
                onChange={(e) => handleChange(e)}
                disabled={disabled}
            >
                {options.map(option => (
                    <option key={option.id} value={option.installment}>
                        {option.installment_name}
                    </option>
                ))}
            </select>
        </div>
    );
}
