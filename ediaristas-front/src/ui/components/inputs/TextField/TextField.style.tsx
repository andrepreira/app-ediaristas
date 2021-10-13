import { styled } from '@mui/material/styles';
import { TextField } from '@mui/material';

export const TextFieldStyled = styled(TextField)`
  .MuiInputBase-root {
    background-color: ${({ theme }) => theme.palette.grey[50]};
  }

  .MuiOtlinedInput-notchedOutline {
    border-color: ${({ theme }) => theme.palette.grey[100]};
  }
`;
