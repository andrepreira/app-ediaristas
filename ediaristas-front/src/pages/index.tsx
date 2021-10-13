import type { NextPage } from 'next';
import SafeEnviroment from 'ui/components/feedback/SafeEnviroment/SafeEnviroment';
import PageTitle from 'ui/components/data-display/PageTitle/PageTitle';
import UserInformation from 'ui/components/data-display/UserInformation/UserInformation';
import TextFieldMask from 'ui/components/inputs/TextFieldMask/TextFieldMask';
import { Button, Typography, Container } from '@mui/material';
import {
  FormElementsContainer,
  ProfissionaisPaper,
  ProfissionaisContainer,
} from '@styles/pages/index.style';
import useIndex from 'data/hooks/pages/useIndex.page';

const Home: NextPage = () => {
  const { cep, setCep } = useIndex();

  return (
    <div>
      <SafeEnviroment />
      <PageTitle
        title={'Conheça os profissionais'}
        subtitle={
          'Preencha seu endereço e veja todos os profissionais da sua localidade'
        }
      />
      <Container>
        <FormElementsContainer>
          <TextFieldMask
            maskCep={'99.999-999'}
            label={'Digite o seu CEP'}
            fullWidth
            variant={'outlined'}
            value={cep}
            onChange={(event) => setCep(event.target.value)}
          />

          <Typography color={'error'}>CEP Inválido</Typography>
          <Button
            variant={'contained'}
            color={'secondary'}
            sx={{ width: '220px' }}
          >
            Buscar
          </Button>
        </FormElementsContainer>
        <ProfissionaisPaper>
          <ProfissionaisContainer>
            <UserInformation
              name={'André Pereira'}
              picture={'https://github.com/andrepreira.png'}
              rating={5}
              description={'Maceió - AL'}
            />
            <UserInformation
              name={'André Pereira'}
              picture={'https://github.com/andrepreira.png'}
              rating={5}
              description={'Maceió - AL'}
            />
            <UserInformation
              name={'André Pereira'}
              picture={'https://github.com/andrepreira.png'}
              rating={5}
              description={'Maceió - AL'}
            />
            <UserInformation
              name={'André Pereira'}
              picture={'https://github.com/andrepreira.png'}
              rating={5}
              description={'Maceió - AL'}
            />
            <UserInformation
              name={'André Pereira'}
              picture={'https://github.com/andrepreira.png'}
              rating={5}
              description={'Maceió - AL'}
            />
            <UserInformation
              name={'André Pereira'}
              picture={'https://github.com/andrepreira.png'}
              rating={5}
              description={'Maceió - AL'}
            />
          </ProfissionaisContainer>
        </ProfissionaisPaper>
      </Container>
    </div>
  );
};

export default Home;
