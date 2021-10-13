import React from 'react';
import InputMask from 'react-input-mask';
import TextField from 'ui/components/inputs/TextField/TextField';
import { OutlinedTextFieldProps } from '@mui/material';

export interface TextFieldMaskProps extends OutlinedTextFieldProps {
  maskCep: string;
  value: string;
}

const TextFieldMask: React.FC<TextFieldMaskProps> = ({
  maskCep,
  value,
  onChange,
  ...props
}) => {
  return (
    <InputMask mask={maskCep} value={value} onChange={onChange}>
      {() => {
        return <TextField {...props} />;
      }}
    </InputMask>
  );
};

export default TextFieldMask;
